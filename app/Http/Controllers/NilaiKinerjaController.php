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

    public function getNilaiKinerja()
    {
        $data = NilaiKinerja::all();

        return Datatables::of($data)
            ->editColumn('min_persen', function($data) {
                return round($data->min_persen, 2) . '%';
            })
            ->editColumn('max_persen', function($data) {
                return round($data->max_persen, 2) . '%';
            })
            ->editColumn('result_persen', function($data) {
                return round($data->result_persen, 2) . '%';
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
            'min_persen' => 'required|min:1|max:5',
            'max_persen' => 'required|min:1|max:5',
            'result_persen' => 'required|min:1|max:5',
            'nilai' => 'required|min:1|max:5'
        ]);

        $data = [
            'min_persen' => $request->min_persen,
            'max_persen' => $request->max_persen,
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
            'min_persen' => 'required|min:1|max:5',
            'max_persen' => 'required|min:1|max:5',
            'result_persen' => 'required|min:1|max:5',
            'nilai' => 'required|min:1|max:5'
        ]);

        $data = NilaiKinerja::find($id);
        $data->min_persen = $request->min_persen;
        $data->max_persen = $request->max_persen;
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
