<?php

namespace App\Http\Controllers;

use App\Exports\PajakExport;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\TaxHistory;
use Maatwebsite\Excel\Facades\Excel;

class PajakController extends Controller
{
    public function index()
    {
        $title = 'Potongan Pajak';

        return view('potongan.tax.index', [
            'title' => $title
        ]);
    }

    public function datatable(Request $request)
    {
        if (!$request->bulan) {
            $bulan = date('Y-m');
            $data = TaxHistory::whereHas('gaji', function ($query) use ($bulan) {
                $query->whereHas('karyawan', function ($query) {
                    $query->where('status', '<>', '3');
                })->where('bulan', $bulan);
            })->get();
        } else {
            $data = TaxHistory::whereHas('gaji', function ($query) use ($request) {
                $query->whereHas('karyawan', function ($query) {
                    $query->where('status', '<>', '3');
                })->where('bulan', $request->bulan);
            })->get();
        }

        return Datatables::of($data)
            ->editColumn('nama_lengkap', function ($data) {
                return $data->gaji->karyawan->nama_lengkap;
            })
            ->editColumn('gaji_perbulan', function ($data) {
                return number_format($data->gaji_perbulan);
            })
            ->editColumn('gaji_pertahun', function ($data) {
                return number_format($data->gaji_pertahun);
            })
            ->editColumn('thr', function ($data) {
                return number_format($data->thr);
            })
            ->editColumn('penghasilan_bruto', function ($data) {
                return number_format($data->penghasilan_bruto);
            })
            ->editColumn('biaya_jabatan', function ($data) {
                return number_format($data->biaya_jabatan);
            })
            ->editColumn('penghasilan_neto', function ($data) {
                return number_format($data->penghasilan_neto);
            })
            ->editColumn('ptkp_pertahun', function ($data) {
                return number_format($data->ptkp_pertahun);
            })
            ->editColumn('pkp_pertahun', function ($data) {
                return number_format($data->pkp_pertahun);
            })
            ->editColumn('pph21_pertahun', function ($data) {
                return number_format($data->pph21_pertahun);
            })
            ->editColumn('pph21_perbulan', function ($data) {
                return number_format($data->pph21_perbulan);
            })
            ->rawColumns([
                'nama_lengkap', 'gaji_perbulan', 'gaji_pertahun', 'thr', 'penghasilan_bruto',
                'biaya_jabatan', 'penghasilan_neto', 'ptkp_pertahun', 'pkp_pertahun',
                'pph21_pertahun', 'pph21_perbulan'
            ])
            ->make(true);
    }

    public function unduh(Request $request)
    {
        $bln = $request->tahun . '-' . $request->bulan;
        $export = new PajakExport($bln);

        return Excel::download($export, 'pajak_' . $bln . '.xlsx');
    }
}
