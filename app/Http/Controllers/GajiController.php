<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Jobs\ProcessPayroll;

class GajiController extends Controller
{
    public function index()
    {
        $title = 'Daftar Gaji';
        return view('gaji.index', ['title' => $title]);
    }

    public function getGaji(Request $request)
    {
        if (!$request->month) {
            $month = date('Y-m');
            $data = Gaji::with('karyawan')->where('bulan', $month)->get();
        } else {
            $data = Gaji::with('karyawan')->where('bulan', $request->month)->get();
        }

        return Datatables::of($data)
            ->editColumn('no_induk', function($data) {
                return '<span class="text-muted">'. $data->karyawan->no_induk .'</span>';
            })
            ->editColumn('nama_lengkap', function($data) {
                return $data->karyawan->nama_lengkap;
            })
            ->editColumn('gaji_pokok', function($data) {
                return number_format($data->gaji_pokok);
            })
            ->editColumn('lembur', function($data) {
                return number_format($data->lembur);
            })
            ->editColumn('insentif', function($data) {
                return number_format($data->insentif);
            })
            ->editColumn('lain_lain', function($data) {
                return number_format($data->lain_lain);
            })
            ->editColumn('tunjangan', function($data) {
                $total_tunjangan = $data->tunjangan_istri + $data->tunjangan_anak + $data->tunjangan_pendidikan + $data->tunjangan_jabatan;
                return number_format($total_tunjangan);
            })
            ->editColumn('potongan', function($data) {
                return number_format($data->potongan);
            })
            ->editColumn('gaji_akhir', function($data) {
                return number_format($data->gaji_akhir);
            })
            ->addColumn('actions', function($data) {
                return view('gaji.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'no_induk', 'nama_lengkap', 'gaji_akhir', 'tunjangan', 'gaji_pokok', 'lembur', 'insentif', 'lain_lain', 'potongan'])
            ->make(true);
    }

    // Calculate Gaji
    public function calculate(Request $request)
    {
        $bln = $request->tahun .'-'. $request->bulan;
    }
}
