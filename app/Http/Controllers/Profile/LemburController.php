<?php

namespace App\Http\Controllers\Profile;

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Models\Lembur;

class LemburController extends ProfileController
{
    public function index()
    {
        return view('profile.lembur.index', ['id' => $this->getId()]);
    }

    public function datatable($id)
    {
        $data = Lembur::with('karyawan')
                ->where('karyawan_id', $id)->latest()->get();

        return Datatables::of($data)
            ->editColumn('total_tarif', function ($data) {
                return number_format($data->total_tarif);
            })
            ->addColumn('tanggal', function ($data) {
                return view('profile.lembur.status', ['data' => $data]);
            })
            ->addColumn('actions', function ($data) {
                return view('profile.lembur.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'tanggal', 'total_tarif'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->merge([
            'karyawan_id' => auth()->user()->karyawan->id,
            'bulan' => $request->year .'-'. $request->month,
            'date' => $request->year .'-'. $request->month .'-'. $request->day
        ]);

        $lembur = Lembur::create($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Ajuan lembur berhasil dibuat'
        ]);
    }

    public function edit($id)
    {
        $get = Lembur::findOrFail($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $lembur = Lembur::findOrFail($id);

        $request->merge([
            'bulan' => $request->year .'-'. $request->month,
            'date' => $request->year .'-'. $request->month .'-'. $request->day
        ]);

        $lembur->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Ajuan lembur berhasil diupdate'
        ]);
    }
}
