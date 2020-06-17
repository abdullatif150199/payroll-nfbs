<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Kinerja;
use App\Models\Karyawan;
use App\Models\PersentaseKinerja;

class KinerjaController extends Controller
{
    public function index()
    {
        $title = 'Kinerja';
        $persentase = PersentaseKinerja::all();
        return view('kinerja.index', ['title' => $title, 'persentase' => $persentase]);
    }

    public function getKinerja (Request $request)
    {
        if (!$request->bulan) {
            $bulan = date('Y-m');
            $data = Karyawan::whereHas('kinerja', function ($q) use ($bulan) {
                $q->where('bulan', $bulan);
            })->get();
            dd($data);
        } else {
            $bulan = $request->bulan;
            $data = Karyawan::has('kinerja')->whereHas('kinerja', function ($q) use ($bulan) {
                $q->where('bulan', $bulan);
            })->get();
        }

        return Datatables::of($data)
            ->editColumn('no_induk', function($data) {
                return '<span class="text-muted">'. $data->karyawan->no_induk .'</span>';
            })
            ->editColumn('nama_lengkap', function($data) {
                return $data->karyawan->nama_lengkap;
            })
            ->addColumn('actions', function($data) {
                return view('kinerja.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'no_induk', 'nama_lengkap'])
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

        $store = $karyawan->kinerja()->create([
            'produktifitas' => $request->produktifitas,
            'kepesantrenan' => $request->kepesantrenan,
            'kehadiran' => $this->persentaseKehadiran($karyawan, $range),
            'pembinaan' => $request->pembinaan,
            'bulan' => $bln
        ]);

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
}
