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

    public function datatable()
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

        $store = JamPerpekan::create($request->all());

        return $store;
    }

    public function edit(JamPerpekan $jam)
    {
        return $jam;
    }

    public function update(Request $request, JamPerpekan $jam)
    {
        $this->validate($request, [
            'keterangan' => 'required|min:2|max:10',
            'jml_jam' => 'required|max:2',
            'jml_hari' => 'required',
        ]);

        $jam->update($request->all());

        return $jam;
    }

    public function destroy($jam)
    {
        $get = JamPerpekan::with('karyawan')->findOrFail($jam);

        if ($get->karyawan->count() > 0) {
            return back()->withError($get->keterangan . ' tidak bisa dihapus');
        }

        $get->delete();

        return back();
    }
}
