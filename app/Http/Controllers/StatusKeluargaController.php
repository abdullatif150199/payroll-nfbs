<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\StatusKeluarga;

class StatusKeluargaController extends Controller
{
    public function index()
    {
        $title = 'Status Keluarga';
        return view('status_keluarga.index', compact('title'));
    }

    public function datatable()
    {
        $data = StatusKeluarga::all();

        return Datatables::of($data)
            ->editColumn('persentase', function($data) {
                return $data->to_persen . '% dari GAPOK';
            })
            ->editColumn('jml_peserta', function($data) {
                return $data->keluarga()->count();
            })
            ->addColumn('actions', function($data) {
                return view('status_keluarga.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'persentase', 'jml_peserta'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|min:2|max:20',
            'persen' => 'min:1|max:5'
        ]);

        $data = [
            'status' => $request->status,
            'persen' => $request->persen
        ];

        $store = StatusKeluarga::create($data);

        return $store;
    }

    public function edit($id)
    {
        $get = StatusKeluarga::find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|min:2|max:20',
            'persen' => 'min:1|max:5'
        ]);

        $data = StatusKeluarga::find($id);
        $data->status = $request->status;
        $data->persen = $request->persen;
        $data->save();

        return $data;
    }

    public function destroy($id)
    {
        $get = StatusKeluarga::with('keluarga')->findOrFail($id);

        if ($get->keluarga->count() > 0) {
            return back()->withError($get->status . ' tidak bisa dihapus');
        }

        $get->delete();

        return back();
    }
}
