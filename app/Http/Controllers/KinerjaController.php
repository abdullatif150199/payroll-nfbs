<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Eloquent\Builder;
use App\Jobs\ProcessPayroll;
use App\Models\PersentaseKinerja;
use App\Models\Karyawan;
use App\Models\HistoryKinerja;
use App\Models\NilaiKinerja;
use App\Imports\ImportKinerja;

class KinerjaController extends Controller
{
    public function index()
    {
        $title = 'Kinerja';
        $persentase = PersentaseKinerja::all();
        // $nilai_kinerja = NilaiKinerja::all();
        // dd(\App\Models\Gaji::find(2)->resultKinerja($nilai_kinerja));
        return view('kinerja.index', ['title' => $title, 'persentase' => $persentase]);
    }

    public function datatable(Request $request)
    {
        $bulan = $request->bulan;
        $user = auth()->user();
        $data = Karyawan::query();

        if (!$request->bulan) {
            $bulan = date('Y-m');
        }

        if ($user->hasRole(['admin', 'root'])) {
            $data = Karyawan::with(['gajiOne' => function ($q) use ($bulan) {
                    $q->bulan($bulan);
                }])
                ->when($request->bidang, function ($q) use ($request) {
                    $q->whereHas('bidang', function ($query) use ($request) {
                        $query->where('id', $request->bidang);
                    });
                })
                ->where('status', '<>', '3')
                ->latest();
        } else {
            $data = Karyawan::whereHas('bidang', function (Builder $query) use ($user) {
                $query->whereIn('nama_bidang', $user->karyawan->bidang->pluck('nama_bidang'));
            })
                ->orWhereHas('unit', function (Builder $query) use ($user) {
                    $query->whereIn('nama_unit', $user->karyawan->unit->pluck('nama_unit'));
                })
                ->with(['gajiOne' => function ($q) use ($bulan) {
                    $q->bulan($bulan);
                }])
                ->where('status', '<>', '3')->latest();
        }

        $nilai_kinerja = NilaiKinerja::get();

        return Datatables::of($data)
            ->editColumn('no_induk', function ($data) {
                return '<span class="text-muted">' . $data->no_induk . '</span>';
            })
            ->editColumn('nama_lengkap', function ($data) {
                return view('kinerja.name', ['data' => $data]);
            })
            ->editColumn('jenis_kinerja', function ($data) {
                return view('kinerja.types', ['data' => $data]);
            })
            ->editColumn('nilai_kinerja', function ($data) use ($nilai_kinerja) {
                if ($data->gajiOne && $data->gajiOne->historyKinerja()->exists()) {
                    $val = $data->gajiOne->nilaiKinerja($nilai_kinerja);
                    $res = $data->gajiOne->resultKinerja($nilai_kinerja);
                    return '<b class="font-weight-bold text-primary">' . $val . ' | ' . number_format($res) . '</b>';
                }
            })
            ->rawColumns(['no_induk', 'nama_lengkap', 'jenis_kinerja', 'nilai_kinerja'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $bln = $request->year . '-' . $request->month;
        // $at = $bln . '-' . setting('kehadiran_start');
        // $end = $bln . '-' . setting('kehadiran_end');
        // $range = ((strtotime($end) - strtotime($at))/3600/24) + 1;

        // $karyawan = Karyawan::with(['persentasekinerja', 'kehadiran' => function($query) use($at, $end) {
        //     $query->whereBetween('tanggal', [$at, $end]);
        // }])->findOrFail($request->karyawan_id);

        $karyawan = Karyawan::with('persentaseKinerja', 'gaji')->findOrFail($request->karyawan_id);
        $gaji = $karyawan->gaji()->updateOrCreate([
            'bulan' => $bln
        ], [
            'gaji_pokok' => $karyawan->gaji_pokok
        ]);

        if ($gaji->historyKinerja->count() > 0) {
            $gaji->deleteHistoryKinerja($request->unit);
        }

        $store = $gaji->historyKinerja()->createMany($this->kinerjaToArray($request, $karyawan));

        ProcessPayroll::dispatch($karyawan, $bln);

        return $store;
    }

    public function kinerjaToArray($request, $data)
    {
        $toArray = [];
        $bln = $request->year . '-' . $request->month;

        foreach ($data->persentaseKinerja as $item) {
            $toArray[] = [
                'bulan' => $bln,
                'title' => $item->title,
                'value' => $request[$item->title],
                'after_count' => $item->persen * $request[$item->title],
                'unit' => $request->unit
            ];
        }

        return $toArray;
    }

    public function persentaseKehadiran($data, $range)
    {
        $jam_perhari = round($data->jamperpekan->jml_jam / $data->jamperpekan->jml_hari, 2);
        $jam_hadir = total_sum_time($data->kehadiran, $data->tipe_kerja, 'val');
        $jam_wajib = ($range * $jam_perhari) * 3600;

        if ($jam_wajib <= 0) {
            return 0;
        }

        $persen = ($jam_hadir / $jam_wajib) * 100;

        if ($persen > 100) {
            return 100;
        }

        return round($persen);
    }

    public function edit($id)
    {
        $get = HistoryKinerja::find($id);
        return $get;
    }

    public function show($id)
    {
        $get = Karyawan::with('persentasekinerja')->findOrFail($id);

        return $get;
    }

    public function attach(Request $request, $id)
    {
        $karyawan = Karyawan::with('persentasekinerja')->findOrFail($id);
        $karyawan->persentasekinerja()->detach();
        $karyawan->persentasekinerja()->attach($request->kinerja);

        return redirect()->back()->withSuccess("Item kinerja berhasil ditambahkan ke {$karyawan->nama_lengkap}.");
    }

    public function destroy($id)
    {
        $kinerja = HistoryKinerja::findOrFail($id);
        $kinerja->delete();

        return redirect()->back()->withSuccess(sprintf('Kinerja %s berhasil di hapus.', $kinerja->title));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);

        $import = new ImportKinerja;
        $import->import($request->file);

        if ($import->failures()->isNotEmpty()) {
            return view('kinerja.failures', [ 
                'failures' => $import->failures()
            ]);
        }

        return back()->withSuccess('Data berhasil diimport ke database');
    }
}
