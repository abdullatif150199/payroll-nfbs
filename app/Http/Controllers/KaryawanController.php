<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KaryawanFormRequest;
use Yajra\Datatables\Datatables;
use App\Karyawan;
use App\Golongan;
use App\Jabatan;
use App\Bidang;
use App\Unit;
use App\User;

class KaryawanController extends Controller
{
    public function index()
    {
        $title = 'Karyawan';
        $golongan = Golongan::select('id', 'kode_golongan')->get();
        $jabatan = Jabatan::select('id', 'nama_jabatan')->get();
        $bidang = Bidang::select('id', 'nama_bidang')->get();
        $unit = Unit::select('id', 'nama_unit')->get();
        // $a = Karyawan::find(1);
        // dd($a->unit);
        return view('karyawan.index', [
            'title' => $title,
            'golongan' => $golongan,
            'jabatan' => $jabatan,
            'bidang' => $bidang,
            'unit' => $unit
        ]);
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
            ->editColumn('unit', function($data) {
                return view('karyawan.unit', ['unit' => $data->unit]);
            })
            ->addColumn('actions', function($data) {
                return view('karyawan.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'jabatan', 'golongan', 'no_induk', 'unit'])
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
            'golongan_id' => $golongan
        ]);
    }
}
