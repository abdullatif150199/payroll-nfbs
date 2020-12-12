<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index()
    {
        $title = 'Unit';
        return view('unit.index', ['title' => $title]);
    }

    public function datatable()
    {
        $data = Unit::all();

        return Datatables::of($data)
            ->editColumn('jml_peserta', function ($data) {
                return $data->karyawan()->count();
            })
            ->editColumn('bidang', function ($data) {
                return $data->bidang->nama_bidang;
            })
            ->addColumn('actions', function ($data) {
                return view('unit.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'jml_peserta', 'bidang'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'bidang_id' => 'required',
            'nama_unit' => 'min:2|max:150'
        ]);

        $data = [
            'bidang_id' => $request->bidang_id,
            'nama_unit' => $request->nama_unit
        ];

        Unit::create($data);

        return response()->json([
            'status' => 200,
            'message' => 'Unit berhasil ditambahkan'
        ]);
    }

    public function edit($id)
    {
        $get = Unit::with('bidang')->find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'bidang_id' => 'required',
            'nama_bidang' => 'min:2|max:150'
        ]);

        $update = Unit::find($id);
        $update->bidang_id = $request->bidang_id;
        $update->nama_unit = $request->nama_unit;
        $update->update();

        return response()->json([
            'status' => 200,
            'message' => 'Unit berhasil diupdate'
        ]);
    }

    public function destroy($id)
    {
        $get = Unit::with('karyawan')->findOrFail($id);

        if ($get->karyawan->count() > 0) {
            return response()->json([
                'status' => 403,
                'message' => 'Unit tidak bisa dihapus'
            ]);
        }

        $get->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Unit berhasil dihapus'
        ]);
    }
}
