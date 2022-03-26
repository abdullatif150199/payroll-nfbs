<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\PersentaseKinerja;

class PersentaseKinerjaController extends Controller
{
    public function index()
    {
        $title = 'Persentase Kinerja';
        return view('persentase_kinerja.index', compact('title'));
    }

    public function datatable()
    {
        $data = PersentaseKinerja::query();

        return Datatables::of($data)
            ->editColumn('persen', function($data) {
                return $data->to_persen . '%';
            })
            ->editColumn('jml_peserta', function($data) {
                return $data->karyawan()->count();
            })
            ->addColumn('actions', function($data) {
                return view('persentase_kinerja.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'persen', 'jml_peserta'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:2|max:20',
            'persen' => 'min:1|max:5'
        ]);

        $data = [
            'title' => $request->title,
            'persen' => $request->persen
        ];

        $store = PersentaseKinerja::create($data);

        return $store;
    }

    public function edit($id)
    {
        $get = PersentaseKinerja::find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:2|max:20',
            'persen' => 'min:1|max:5'
        ]);

        $data = PersentaseKinerja::find($id);
        $data->title = $request->title;
        $data->persen = $request->persen;
        $data->save();

        return $data;
    }

    public function destroy($id)
    {
        $get = PersentaseKinerja::with('karyawan')->findOrFail($id);

        if ($get->karyawan->count() > 0) {
            return back()->withError($get->title . ' tidak bisa dihapus');
        }

        $get->delete();

        return back();
    }
}
