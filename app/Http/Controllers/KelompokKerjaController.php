<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\KelompokKerja;

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
                return $data->persen * 100 . '% dari GAPOK';
            })
            ->editColumn('peserta', function($data) {
                return $data->karyawans()->count();
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
            'persen' => 'min:1|max:5'
        ]);

        $data = [
            'grade' => $request->grade,
            'persen' => $request->persen/100
        ];

        $store = KelompokKerja::create($data);

        return $store;
    }

    public function edit($id)
    {
        $get = KelompokKerja::find($id);
        $get->persen = $get->persen * 100;
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'grade' => 'min:1|max:1',
            'persen' => 'min:1|max:5'
        ]);

        $data = KelompokKerja::find($id);
        $data->grade = $request->grade;
        $data->persen = $request->persen/100;
        $data->save();

        return $data;
    }
}
