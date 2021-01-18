<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\TarifLembur;

class TarifLemburController extends Controller
{
    public function index()
    {
        $title = 'Tarif Lembur';
        return view('tarif_lembur.index', ['title' => $title]);
    }

    public function datatable()
    {
        $data = TarifLembur::get();

        return Datatables::of($data)
            ->editColumn('tarif', function ($data) {
                return number_format($data->tarif);
            })
            ->addColumn('actions', function ($data) {
                return view('tarif_lembur.actions', ['data' => $data]);
            })
            ->rawColumns(['tarif','actions'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'golongan' => 'required',
            'kelompok' => 'required',
            'tarif' => 'min:4|max:14'
        ]);

        $data = [
            'golongan' => $request->golongan,
            'kelompok' => $request->kelompok,
            'tarif' => preg_replace('/\D/', '', $request->tarif)
        ];

        TarifLembur::create($data);

        return response()->json([
            'status' => 200,
            'message' => 'Tarif Lembur berhasil ditambahkan'
        ]);
    }

    public function edit($id)
    {
        $get = TarifLembur::find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'golongan' => 'required',
            'kelompok' => 'required',
            'tarif' => 'min:4|max:14'
        ]);

        $update = TarifLembur::find($id);
        $update->golongan = $request->golongan;
        $update->kelompok = $request->kelompok;
        $update->tarif = preg_replace('/\D/', '', $request->tarif);
        $update->update();

        return response()->json([
            'status' => 200,
            'message' => 'Tarif lembur berhasil diupdate'
        ]);
    }

    public function destroy($id)
    {
        TarifLembur::destroy($id);

        return response()->json([
            'status' => 200,
            'message' => 'Tarif Lembur berhasil dihapus'
        ]);
    }
}
