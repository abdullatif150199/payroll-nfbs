<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Golongan;

class GolonganController extends Controller
{
    public function index()
    {
        $title = 'Golongan';
        return view('golongan.index', ['title' => $title]);
    }

    public function getGolongan()
    {
        $data = Golongan::all();

        return Datatables::of($data)
            ->addColumn('actions', function($data) {
                return view('golongan.actions', ['data' => $data]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_golongan' => 'min:2|max:10',
            'gaji_pokok' => 'min:4|max:14',
            'lembur' => 'min:4|max:14'
        ]);

        $data = [
            'kode_golongan' => $request->kode_golongan,
            'gaji_pokok' => str_replace('.', '', $request->gaji_pokok),
            'lembur' => str_replace('.', '', $request->lembur)
        ];

        $store = Golongan::create($data);

        return $store;
    }

    public function edit($id)
    {
        $get = Golongan::find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_golongan' => 'min:2|max:10',
            'gaji_pokok' => 'min:4|max:14',
            'lembur' => 'min:4|max:14'
        ]);

        $update = Golongan::find($id);
        $update->kode_golongan = $request->kode_golongan;
        $update->gaji_pokok = str_replace('.', '', $request->gaji_pokok);
        $update->lembur = str_replace('.', '', $request->lembur);
        $update->update();

        return $update;
    }
}
