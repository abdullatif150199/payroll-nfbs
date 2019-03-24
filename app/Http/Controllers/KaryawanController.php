<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KaryawanFormRequest;
use Yajra\Datatables\Datatables;
use App\Karyawan;
use App\User;

class KaryawanController extends Controller
{
    public function index()
    {
        $title = 'Karyawan';
        return view('karyawan.index', ['title' => $title]);
    }

    public function getKaryawan()
    {
        $data = Karyawan::all();

        return Datatables::of($data)
            ->editColumn('no_induk', function($data) {
                return '<span class="text-muted">'. $data->no_induk .'</span>';
            })
            ->editColumn('jabatan', function($data) {
                return $data->jabatan->nama_jabatan;
            })
            ->editColumn('golongan', function($data) {
                return $data->golongan->kode_golongan;
            })
            ->editColumn('bidang', function($data) {
                return $data->bidang->nama_bidang;
            })
            ->addColumn('actions', function($data) {
                return view('karyawan.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'jabatan', 'golongan', 'no_induk'])
            ->make(true);
    }

    public function store(KaryawanFormRequest $request)
    {
        $check = User::where('name', $request->nama_lengkap)->where('email', $request->email)->first();
        $modif = $request->merge([
            'user_id'
        ]);
    }
}
