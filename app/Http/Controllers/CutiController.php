<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Cuti;

class CutiController extends Controller
{
    public function index()
    {
        $title = 'Daftar Cuti';
        return view('cuti.index', ['title' => $title]);
    }

    public function getCuti()
    {
        $data = Cuti::with(['karyawan' => function($query) {
            $query->with('unit');
        }])->orderby('created_at', 'desc')->get();

        return Datatables::of($data)
            ->addColumn('actions', function($data) {
                return view('cuti.actions', ['data' => $data]);
            })
            ->addColumn('progress', function($data) {
                return view('cuti.progress', ['data' => $data]);
            })
            ->editColumn('no_induk', function($data) {
                return '<span class="text-muted">'. $data->karyawan->no_induk .'</span>';
            })
            ->editColumn('nama_lengkap', function($data) {
                return $data->karyawan->nama_lengkap;
            })
            ->editColumn('jenis_kelamin', function($data) {
                return $data->karyawan->jenis_kelamin;
            })
            ->editColumn('unit', function($data) {
                return view('cuti.unit', ['unit' => $data->karyawan->unit]);
            })
            ->rawColumns(['actions', 'progress', 'no_induk', 'nama_lengkap', 'jenis_kelamin', 'unit'])
            ->make(true);
    }
}
