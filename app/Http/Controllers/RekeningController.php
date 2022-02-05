<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Rekening;

class RekeningController extends Controller
{
    public function index()
    {
        $title = 'Rekening';
        return view('rekening.index', ['title' => $title]);
    }

    public function datatable()
    {
        $data = Rekening::get();

        return Datatables::of($data)
            ->addColumn('actions', function ($data) {
                return view('rekening.actions', ['data' => $data]);
            })
            ->editColumn('rekening', function ($data) {
                return view('rekening.rekening', ['data' => $data]);
            })
            ->rawColumns(['actions', 'rekening'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'no_rekening' => 'required|min:5|max:20',
            'atas_nama' => 'required|min:3',
            'bank' => 'required',
            'type' => 'required',
            'keterangan' => 'required'
        ]);

        $data = [
            'no_rekening' => $request->no_rekening,
            'atas_nama' => $request->atas_nama,
            'bank' => $request->bank,
            'type' => $request->type,
            'keterangan' => $request->keterangan,
        ];

        Rekening::create($data);

        return response()->json([
            'status' => 200,
            'message' => 'Rekening berhasil ditambahkan'
        ]);
    }

    public function edit($id)
    {
        $get = Rekening::find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_rekening' => 'required|min:5|max:20',
            'atas_nama' => 'required|min:3',
            'bank' => 'required',
            'type' => 'required',
            'keterangan' => 'required'
        ]);

        $update = Rekening::find($id);
        $update->no_rekening = $request->no_rekening;
        $update->atas_nama = $request->atas_nama;
        $update->bank = $request->bank;
        $update->type = $request->type;
        $update->keterangan = $request->keterangan;
        $update->update();

        return response()->json([
            'status' => 200,
            'message' => 'Rekening berhasil diupdate'
        ]);
    }

    public function destroy($id)
    {
        $get = Rekening::with('potongan')->findOrFail($id);

        if ($get->potongan->count() > 0) {
            return response()->json([
                'status' => 403,
                'message' => 'Rekening tidak boleh dihapus'
            ]);
        }

        $get->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Rekening berhasil dihapus'
        ]);
    }
}
