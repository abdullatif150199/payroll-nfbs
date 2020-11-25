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
        $data = Jabatan::all();

        return Datatables::of($data)
            ->editColumn('jml_peserta', function($data) {
                    return $data->karyawan()->count();
            })
            ->editColumn('tunjangan_jabatan', function($data) {
                    return number_format($data->tunjangan_jabatan);
            })
            ->editColumn('load', function($data) {
                    return number_format($data->load);
            })
            ->addColumn('actions', function($data) {
                return view('jabatan.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'jml_peserta', 'tunjangan_jabatan', 'load'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_jabatan' => 'required',
            'load' => 'required',
            'maksimal_jam' => 'required'
        ]);

        $store = Jabatan::create($request->all());

        return $store;
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
            'load' => 'required',
            'maksimal_jam' => 'required'
        ]);

        $jabatan->update($request->all());

        return $jabatan;
    }

    public function destroy($jabatan)
    {
        $get = Jabatan::with('karyawan')->findOrFail($jabatan);

        if ($get->karyawan->count() > 0) {
            return back()->withError($get->nama_jabatan . ' tidak bisa dihapus');
        }

        $get->delete();

        return back();
    }
}
