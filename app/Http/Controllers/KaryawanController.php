<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KaryawanFormRequest;
use Yajra\Datatables\Datatables;
use App\Karyawan;
use App\Golongan;
use App\Jabatan;
use App\Bidang;
use App\User;

class KaryawanController extends Controller
{
    public function index()
    {
        $title = 'Karyawan';
        // $golongan =
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
        dd($request->bidang);
        $username = strtok($request->nama_lengkap, ' ') . $request->birth['day'];
        $check = User::where('username', $username)->first();

        if ($check) {
            $username = strtok($request->nama_lengkap, ' ') . $request->birth['month'];
            if (User::where('username', $username)->first()) {
                $username = strtok($request->nama_lengkap, ' ') . substr($request->birth['year'], -2);
            }
        }

        $user = User::create([
            'name' => $request->nama_lengkap,
            'username' => $username,
            'email' => $request->nama_lengkap . '@example.com',
            'password' => $request->birth['day'] . $request->birth['month'] . $request->birth['year'], // secret
        ]);

        $modif = $request->merge([
            'user_id' => $user->id,
            'golongan_id' => $golo
        ]);
    }
}
