<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Tax;

class TaxController extends Controller
{
    public function index()
    {
        $title = 'Pajak';
        return view('tax.index', ['title' => $title]);
    }

    public function datatable()
    {
        $data = Tax::with('karyawan')->get();

        return Datatables::of($data)
            ->editColumn('ptkp_pertahun', function ($data) {
                return number_format($data->ptkp_pertahun);
            })
            ->editColumn('ptkp_perbulan', function ($data) {
                return number_format($data->ptkp_perbulan);
            })
            ->editColumn('persentase_pph21', function ($data) {
                return $data->persentase_pph21 * 100 . '%';
            })
            ->editColumn('persentase_biaya_jabatan', function ($data) {
                return $data->persentase_biaya_jabatan * 100 . '%';
            })
            ->addColumn('actions', function ($data) {
                return view('tax.actions', ['data' => $data]);
            })
            ->rawColumns(['persentase_pph21', 'persentase_biaya_jabatan', 'actions'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:50',
            'ptkp_pertahun' => 'required|max:20',
            'ptkp_perbulan' => 'required|max:20',
            'persentase_pph21' => 'required|max:5',
            'persentase_biaya_jabatan' => 'required|max:5',
        ]);

        return Tax::create([
            'kode' => $request->kode,
            'ptkp_pertahun' => $request->ptkp_pertahun,
            'ptkp_perbulan' => $request->ptkp_perbulan,
            'persentase_pph21' => $request->persentase_pph21,
            'persentase_biaya_jabatan' => $request->persentase_biaya_jabatan,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Pajak berhasil ditambahkan'
        ]);
    }

    public function edit($id)
    {
        $get = Tax::findOrFail($id);

        return $get;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:50',
            'ptkp_pertahun' => 'required|max:20',
            'ptkp_perbulan' => 'required|max:20',
            'persentase_pph21' => 'required|max:5',
            'persentase_biaya_jabatan' => 'required|max:5',
        ]);

        $tax = Tax::findOrFail($id);

        $tax->update([
            'kode' => $request->kode,
            'ptkp_pertahun' => $request->ptkp_pertahun,
            'ptkp_perbulan' => $request->ptkp_perbulan,
            'persentase_pph21' => $request->persentase_pph21,
            'persentase_biaya_jabatan' => $request->persentase_biaya_jabatan,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Pajak berhasil diupdate'
        ]);
    }

    public function destroy($id)
    {
        $get = Tax::with('karyawan')->findOrFail($id);

        if ($get->karyawan->count() > 0) {
            return response()->json([
                'status' => 403,
                'message' => 'Pajak tidak bisa dihapus'
            ]);
        }

        $get->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Pajak berhasil dihapus'
        ]);
    }
}
