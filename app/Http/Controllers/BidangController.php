<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Bidang;

class BidangController extends Controller
{
    public function index()
    {
        $title = 'Bidang';
        return view('bidang.index', ['title' => $title]);
    }

    public function getBidang()
    {
        $data = Bidang::all();

        return Datatables::of($data)
            ->editColumn('jml_peserta', function($data) {
                    return $data->karyawan()->count();
            })
            ->editColumn('jml_unit', function($data) {
                    return $data->unit()->count();
            })
            ->addColumn('actions', function($data) {
                return view('bidang.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'jml_peserta', 'jml_unit'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_bidang' => 'min:2|max:10'
        ]);

        $data = [
            'nama_bidang' => $request->nama_bidang
        ];

        $store = Bidang::create($data);

        return $store;
    }

    public function edit($id)
    {
        $get = Bidang::find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_bidang' => 'min:2|max:10'
        ]);

        $update = Bidang::find($id);
        $update->nama_bidang = $request->nama_bidang;
        $update->update();

        return $update;
    }

    public function destroy($id)
    {
        $get = Bidang::with('karyawan')->findOrFail($id);

        if ($get->karyawan->count() > 0) {
            return back()->withError('Bidang tidak bisa dihapus');
        }

        $get->delete();

        return back();
    }
}
