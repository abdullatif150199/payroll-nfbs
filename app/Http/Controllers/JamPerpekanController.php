<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\JamPerpekan;

class JamPerpekanController extends Controller
{
    public function index()
    {
        $title = 'Jam Perpekan';
        return view('jam_perpekan.index', ['title' => $title]);
    }

    public function getJamPerpekan()
    {
        $data = JamPerpekan::all();

        return Datatables::of($data)
            ->editColumn('jml_jam', function($data) {
                    return $data->jml_jam . ' Jam';
            })
            ->editColumn('jml_hari', function($data) {
                    return $data->jml_hari . ' Hari';
            })
            ->addColumn('actions', function($data) {
                return view('jam_perpekan.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'jml_jam', 'jml_hari'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'keterangan' => 'required|min:2|max:10',
            'jml_jam' => 'required|max:2',
            'jml_hari' => 'required',
        ]);

        $data = [
            'keterangan' => $request->keterangan,
            'jml_jam' => $request->jml_jam,
            'jml_hari' => $request->jml_hari
        ];

        $store = JamPerpekan::create($data);

        return $store;
    }

    public function edit($id)
    {
        $get = JamPerpekan::find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'keterangan' => 'required|min:2|max:10',
            'jml_jam' => 'required|max:2',
            'jml_hari' => 'required',
        ]);

        $update = JamPerpekan::find($id);
        $update->keterangan = $request->keterangan;
        $update->jml_jam = $request->jml_jam;
        $update->jml_hari = $request->jml_hari;
        $update->update();

        return $update;
    }

    public function destroy($id)
    {
        $get = JamPerpekan::with('karyawan')->findOrFail($id);

        if ($get->karyawan->count() > 0) {
            return back()->withError($get->keterangan . ' tidak bisa dihapus');
        }

        $get->delete();

        return back();
    }
}
