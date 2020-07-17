<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Jobs\ProcessPayroll;
use App\Models\PersentaseKinerja;
use App\Models\Karyawan;
use App\Models\Kinerja;

class KinerjaController extends Controller
{
    public function index()
    {
        $title = 'Kinerja';
        $persentase = PersentaseKinerja::all();
        return view('kinerja.index', ['title' => $title, 'persentase' => $persentase]);
    }

    public function datatable(Request $request)
    {
        $data = Karyawan::query();
        $bulan = $request->bulan;

        if (!$request->bulan) {
            $bulan = date('Y-m');
        }

        $data->with(['persentasekinerja', 'kinerja' => function($q) use($bulan) {
            $q->where('bulan', $bulan);
        }])->latest();

        return Datatables::of($data)
            ->editColumn('no_induk', function($data) {
                return '<span class="text-muted">'. $data->no_induk .'</span>';
            })
            ->editColumn('nama_lengkap', function($data) {
                return view('kinerja.name', ['data' => $data]);
            })
            ->editColumn('jenis_kinerja', function($data) {
                return view('kinerja.types', ['data' => $data]);
            })
            ->rawColumns(['no_induk', 'nama_lengkap', 'jenis_kinerja'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $bln = $request->year . '-' . $request->month;
        $at = $bln . '-' . setting('kehadiran_start');
        $end = $bln . '-' . setting('kehadiran_end');
        $range = ((strtotime($end) - strtotime($at))/3600/24) + 1;

        $karyawan = Karyawan::with(['persentasekinerja', 'kehadiran' => function($query) use($at, $end) {
            $query->whereBetween('tanggal', [$at, $end]);
        }])->findOrFail($request->karyawan_id);

        $store = [];

        foreach($karyawan->persentaseKinerja as $item){
            if ($item->id !== 1) {
                $data = $karyawan->kinerja()->firstOrNew([
                    'bulan' => $bln,
                    'title' => $item->title
                ]);
                $data->value = $request[$item->title];
                $data->save();
                $store[] = $data;
            } else {
                $data = $karyawan->kinerja()->firstOrNew([
                    'bulan' => $bln,
                    'title' => $item->title
                ]);
                $data->value = $this->persentaseKehadiran($karyawan, $range);
                $data->save();
                $store[] = $data;
            }
        }

        ProcessPayroll::dispatch($karyawan, $bln);

        return $store;
    }

    public function persentaseKehadiran($data, $range)
    {
        $jam_perhari = round($data->jamperpekan->jml_jam/$data->jamperpekan->jml_hari, 2);
        $jam_hadir = total_sum_time($data->kehadiran, $data->tipe_kerja, 'val');
        $jam_wajib = ($range * $jam_perhari) * 3600;

        if ($jam_wajib <= 0) {
            return 0;
        }

        $persen = ($jam_hadir/$jam_wajib) * 100;

        if ($persen > 100) {
            return 100;
        }

        return round($persen);
    }

    public function edit($id)
    {
        $get = Kinerja::with('karyawan')->find($id);
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

    public function detach($id_kinerja, $id_karyawan)
    {
        $kinerja = Kinerja::with('karyawan')->findOrFail($id_kinerja);
        $kinerja->karyawan()->detach($id_karyawan);

        return redirect()->back()->withSuccess(sprintf('Kinerja %s berhasil di hapus.', $kinerja->nama_kinerja));
    }
}
