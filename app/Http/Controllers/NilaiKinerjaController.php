<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\NilaiKinerja;

class NilaiKinerjaController extends Controller
{
    public function index()
    {
        $title = 'Nilai Kinerja';
        return view('nilai_kinerja.index', compact('title'));
    }

    public function datatable()
    {
        $data = NilaiKinerja::query();

        return Datatables::of($data)
            ->editColumn('min_persen', function($data) {
                return $data->to_min_persen . '%';
            })
            ->editColumn('result_persen', function($data) {
                return $data->to_result_persen . '%';
            })
            ->addColumn('actions', function($data) {
                return view('nilai_kinerja.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'result_persen', 'min_persen', 'max_persen'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'min_nilai' => 'required|min:1|max:5',
            'result_persen' => 'required|min:1|max:5',
            'nilai' => 'required|min:1|max:5'
        ]);

        $data = [
            'min_nilai' => $request->min_nilai,
            'result_persen' => $request->result_persen,
            'nilai' => $request->nilai,
        ];

        $store = NilaiKinerja::create($data);

        return $store;
    }

    public function edit($id)
    {
        $get = NilaiKinerja::find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'min_nilai' => 'required|min:1|max:5',
            'result_persen' => 'required|min:1|max:5',
            'nilai' => 'required|min:1|max:5'
        ]);

        $data = NilaiKinerja::find($id);
        $data->min_nilai = $request->min_nilai;
        $data->result_persen = $request->result_persen;
        $data->nilai = $request->nilai;
        $data->save();

        return $data;
    }

    public function destroy($id)
    {
        $get = NilaiKinerja::destroy($id);

        return back();
    }
}
