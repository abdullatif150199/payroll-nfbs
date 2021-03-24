<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\JamAjar;

class JamAjarController extends Controller
{
    public function index()
    {
        $title = 'Jam Ajar';
        return view('jam_ajar.index', ['title' => $title]);
    }

    public function datatable()
    {
        $data = JamAjar::all();

        return Datatables::of($data)
            ->editColumn('jml', function($data) {
                    return $data->jml . ' Jam';
            })
            ->addColumn('actions', function($data) {
                return view('jam_ajar.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'jml'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'ket' => 'required|min:2|max:150',
            'jml' => 'required|max:2'
        ]);

        $store = JamAjar::create($request->all());

        return $store;
    }

    public function edit(JamAjar $jam)
    {
        return $jam;
    }

    public function update(Request $request, JamAjar $jam)
    {
        $this->validate($request, [
            'ket' => 'required|min:2|max:150',
            'jml' => 'required|max:2',
        ]);

        $jam->update($request->all());

        return $jam;
    }

    public function destroy($jam)
    {
        $get = JamAjar::with('karyawan')->findOrFail($jam);

        if ($get->karyawan->count() > 0) {
            return back()->withError($get->keterangan . ' tidak bisa dihapus');
        }

        $get->delete();

        return back();
    }
}
