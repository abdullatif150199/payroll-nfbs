<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\KelompokKerja;

class KelompokKerjaController extends Controller
{
    public function index()
    {
        $title = 'Kelompok Kerja';
        return view('kelompok_kerja.index', compact('title'));
    }

    public function getKelompokKerja()
    {
        $data = KelompokKerja::all();

        return Datatables::of($data)
            ->editColumn('persen', function($data) {
                return $data->to_persen . '% GAPOK';
            })
            ->editColumn('peserta', function($data) {
                return $data->karyawan()->count();
            })
            ->addColumn('actions', function($data) {
                return view('kelompok_kerja.actions', ['data' => $data]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'grade' => 'min:1|max:1',
            'persen' => 'min:1|max:5',
            'kinerja_normal' => 'min:3'
        ]);

        $data = [
            'grade' => $request->grade,
            'persen' => $request->persen,
            'kinerja_normal' => $request->kinerja_normal
        ];

        $store = KelompokKerja::create($data);

        return $store;
    }

    public function edit($id)
    {
        $get = KelompokKerja::find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'grade' => 'min:1|max:1',
            'persen' => 'min:1|max:5',
            'kinerja_normal' => 'min:3'
        ]);

        $data = KelompokKerja::find($id);
        $data->grade = $request->grade;
        $data->persen = $request->persen;
        $data->kinerja_normal = $request->kinerja_normal;

        $data->save();

        return $data;
    }
}
