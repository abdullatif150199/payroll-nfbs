<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\StatusKerja;

class StatusKerjaController extends Controller
{
    public function index()
    {
        $title = 'Status Kerja';
        return view('status_kerja.index', compact('title'));
    }

    public function getStatusKerja()
    {
        $data = StatusKerja::all();

        return Datatables::of($data)
            ->editColumn('persentase', function($data) {
                return $data->to_persen . '% dari GATOT';
            })
            ->editColumn('jml_peserta', function($data) {
                return $data->karyawan()->count();
            })
            ->addColumn('actions', function($data) {
                return view('status_kerja.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'persentase', 'jml_peserta'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_status_kerja' => 'required|min:2|max:20',
            'persentase_gaji_pokok' => 'min:1|max:5'
        ]);

        $data = [
            'nama_status_kerja' => $request->nama_status_kerja,
            'persentase_gaji_pokok' => $request->persentase_gaji_pokok
        ];

        $store = StatusKerja::create($data);

        return $store;
    }

    public function edit($id)
    {
        $get = StatusKerja::find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_status_kerja' => 'required|min:2|max:20',
            'persentase_gaji_pokok' => 'min:1|max:5'
        ]);

        $data = StatusKerja::find($id);
        $data->nama_status_kerja = $request->nama_status_kerja;
        $data->persentase_gaji_pokok = $request->persentase_gaji_pokok;
        $data->save();

        return $data;
    }

    public function destroy($id)
    {
        $get = StatusKerja::with('karyawan')->findOrFail($id);

        if ($get->karyawan->count() > 0) {
            return back()->withError($get->nama_status_kerja . ' tidak bisa dihapus');
        }

        $get->delete();

        return back();
    }
}
