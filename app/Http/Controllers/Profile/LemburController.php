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
                ->where('karyawan_id', $id)->get();

        return Datatables::of($data)
            ->editColumn('tanggal', function ($data) {
                return '<span class="text-muted">'. yearMonth($data->bulan) .'</span>';
            })
            ->editColumn('total_tarif', function ($data) {
                return number_format($data->gaji_akhir);
            })
            ->addColumn('actions', function ($data) {
                return view('profile.lembur.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'tanggal', 'total_tarif'])
            ->make(true);
    }
}
