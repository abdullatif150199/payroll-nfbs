<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    public function index()
    {
        $title = 'Jabatan';
        return view('jabatan.index', ['title' => $title]);
    }

    public function datatable()
    {
        $data = Jabatan::query();

        return Datatables::of($data)
            ->editColumn('jml_peserta', function ($data) {
                return $data->karyawan()->count();
            })
            ->editColumn('tunjangan_jabatan', function ($data) {
                return number_format($data->tunjangan_jabatan);
            })
            ->editColumn('load', function ($data) {
                return number_format($data->load);
            })
            ->addColumn('actions', function ($data) {
                return view('jabatan.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'jml_peserta', 'tunjangan_jabatan', 'load'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_jabatan' => 'required:min:2',
            'load' => 'required'
        ]);

        Jabatan::create($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Jabatan berhasil ditambahkan'
        ]);
    }

    public function edit($jabatan)
    {
        $get = Jabatan::find($jabatan);
        return $get;
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $this->validate($request, [
            'nama_jabatan' => 'required',
            'load' => 'required'
        ]);

        $jabatan->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Jabatan berhasil diupdate'
        ]);
    }

    public function destroy($jabatan)
    {
        $get = Jabatan::with('karyawan')->findOrFail($jabatan);

        if ($get->karyawan->count() > 0) {
            return response()->json([
                'status' => 403,
                'message' => 'Jabatan tidak bisa dihapus'
            ]);
        }

        $get->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Jabatan berhasil dihapus'
        ]);
    }
}
