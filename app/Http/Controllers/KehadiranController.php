<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Kehadiran;
use App\Models\Karyawan;

class KehadiranController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->list) {
            $title = 'Daftar Hadir Harian';
            return view('kehadiran.index', ['title' => $title]);
        } else {
            if ($request->list == 'pilihan') {
                $title = 'Daftar Hadir Pilihan';
                return view('kehadiran.pilihan', ['title' => $title]);
            } else {
                abort(404);
            }
        }
    }

    public function getKehadiran(Request $request)
    {
        if (!$request->tanggal) {
            $tanggal = date('Y-m-d');
            $data = Kehadiran::with('karyawan')->where('tanggal', $tanggal)->orderBy('created_at', 'desc')->get();
        } else {
            $data = Kehadiran::with('karyawan')->where('tanggal', $request->tanggal)->orderBy('created_at', 'desc')->get();
        }

        return Datatables::of($data)
            ->addColumn('actions', function($data) {
                return view('kehadiran.actions', compact('data'));
            })
            ->editColumn('jumlah_jam', function($data) {
                if ($data->karyawan->tipe_kerja !== 'shift') {
                    $result = sum_time(
                        $data->jam_masuk,
                        $data->jam_istirahat,
                        $data->jam_kembali,
                        $data->jam_pulang
                    ) ?? '<span class="tag tag-rounded tag-red">Undefined</span>';
                } else {
                    $result = sum_time_shift(
                        $data->jam_masuk,
                        $data->jam_pulang
                    ) ?? '<span class="tag tag-rounded tag-red">Undefined</span>';
                }

                return $result;
            })
            ->editColumn('no_induk', function($data) {
                return '<span class="text-muted">'. $data->karyawan->no_induk .'</span>';
            })
            ->editColumn('nama_lengkap', function($data) {
                return $data->karyawan->nama_lengkap;
            })
            ->rawColumns(['actions', 'jumlah_jam', 'no_induk', 'nama_lengkap'])
            ->make(true);
    }

    public function edit($id)
    {
        $get = Kehadiran::find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jam_masuk' => 'required'
        ]);

        $update = Kehadiran::find($id);
        $update->jam_masuk = $request->jam_masuk;
        $update->jam_istirahat = $request->jam_istirahat;
        $update->jam_kembali = $request->jam_kembali;
        $update->jam_pulang = $request->jam_pulang;
        $update->update();

        return $update;
    }

    public function getPilihan(Request $request)
    {
        if (!$request->dari_tanggal) {
            $dari = date('Y-m-d', strtotime('-1 weeks'));
            $sampai = date('Y-m-d');
            $range = (strtotime($sampai) - strtotime($dari))/3600/24;

            $data = Karyawan::with(['kehadiran' => function($query) use($dari, $sampai) {
                $query->whereBetween('tanggal', [$dari, $sampai]);
            }])->orderBy('nama_lengkap', 'asc')->get();
        } else {
            $dari = $request->dari_tanggal;
            $sampai = date('Y-m-d', strtotime($request->sampai_tanggal . '+1 day'));
            $range = (strtotime($sampai) - strtotime($dari))/3600/24;

            $data = Karyawan::with(['kehadiran' => function($query) use($dari, $sampai) {
                $query->whereBetween('tanggal', [$dari, $sampai]);
            }])->orderBy('nama_lengkap', 'asc')->get();
        }

        return Datatables::of($data)
            ->addColumn('actions', function($data) {
                return view('kehadiran.actions', compact('data'));
            })
            ->editColumn('jumlah_jam', function($data) {

                $result = total_sum_time(
                    $data->kehadiran,
                    $data->tipe_kerja
                ) ?? '<span class="tag tag-rounded tag-red">Undefined</span>';

                return $result;
            })
            ->editColumn('no_induk', function($data) {
                return '<span class="text-muted">'. $data->no_induk .'</span>';
            })
            ->editColumn('nama_lengkap', function($data) {
                return $data->nama_lengkap;
            })
            ->editColumn('persentase', function($data) use($range) {
                $persen = $this->persentaseKehadiran($data, $range);
                return view('kehadiran.persentase', compact('persen'));
            })
            ->rawColumns(['actions', 'jumlah_jam', 'no_induk', 'nama_lengkap', 'persentase'])
            ->make(true);
    }

    public function persentaseKehadiran($data, $range, $default=7)
    {
        $jam_hadir = total_sum_time($data->kehadiran, $data->tipe_kerja, 'val');
        $jam_wajib = ($range * $default) * 3600;

        if ($jam_wajib <= 0) {
            return 0;
        }

        $persen = ($jam_hadir/$jam_wajib) * 100;

        if ($persen > 100) {
            return 100;
        }

        if (is_float($persen)) {
            return number_format($persen, 2);
        } else {
            return $persen;
        }

    }
}
