<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class RiwayatPotonganController extends Controller
{
    public function index()
    {
        $title = 'Riwayat Potongan';

        return view('potongan.history.index', [
            'title' => $title
        ]);
    }

    public function datatable(Request $request)
    {
        $month = $request->month ?? date('Y-m');

        $data = Gaji::with('historyPotongan', 'karyawan')->where('bulan', $month)->get();

        return Datatables::of($data)
            ->editColumn('no_induk', function ($data) {
                return '<span class="text-muted">' . $data->karyawan->no_induk . '</span>';
            })
            ->editColumn('nama_lengkap', function ($data) {
                return $data->karyawan->nama_lengkap;
            })
            ->editColumn('potongan', function ($data) {
                return view('potongan.history.potongan', ['data' => $data->historyPotongan]);
            })
            // ->editColumn('actions', function ($data) {
            //     return view('potongan.history.actions', ['data' => $data]);
            // })
            ->rawColumns([
                'no_induk', 'nama_lengkap', 'potongan', 'actions'
            ])
            ->make(true);
    }
}
