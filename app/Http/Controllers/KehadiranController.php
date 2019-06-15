<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Kehadiran;

class KehadiranController extends Controller
{
    public function index()
    {
        $title = 'Daftar Hadir';
        return view('kehadiran.index', ['title' => $title]);
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
                return view('kehadiran.actions');
            })
            ->editColumn('jumlah_jam', function($data) {
                return total_time($data->jam_masuk, $data->jam_istirahat, $data->jam_kembali, $data->jam_pulang);
            })
            ->editColumn('jumlah_jam_ngajar', function($data) {
                return $data->jumlah_jam_ngajar . ' jam (Guru)';
            })
            ->editColumn('no_induk', function($data) {
                return $data->karyawan->no_induk;
            })
            ->editColumn('nama_lengkap', function($data) {
                return $data->karyawan->nama_lengkap;
            })
            ->rawColumns(['actions', 'jumlah_jam', 'jumlah_jam_ngajar', 'no_induk', 'nama_lengkap'])
            ->make(true);
    }
}
