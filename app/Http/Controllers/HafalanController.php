<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Karyawan;
use App\Models\Mutabaah;
use App\Models\Bidang;
use App\Models\Unit;

use App\Exports\MutabaahPegawaiExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class HafalanController extends Controller
{
    public function index()
    {
        $title = 'Setoran Hafalan';
        $view = 'hafalan.index';
        // $list = [null, 'persentase', 'apel', 'persentase-apel', 'jadwal-apel'];
        $bidang = Bidang::pluck('nama_bidang', 'id');
        $unit = Unit::pluck('nama_unit', 'id');
        $karyawan = Karyawan::orderBy('nama_lengkap')->pluck('nama_lengkap', 'id');

        return view($view, [
            'title' => $title,
            'bidang' => $bidang,
            'unit' => $unit,
            'karyawan' => $karyawan
        ]);
    }

    public function datatable(Request $request)
    {
        $tanggal = $request->tanggal ? $request->tanggal : date('Y-m-d');

        if ($request->unit && $request->unit != '') {
            $data = Mutabaah::with('karyawan')
                ->when($request->unit, function ($query) use ($request) {
                    $query->whereHas('karyawan.unit', function ($q) use ($request) {
                        $q->where('id', $request->unit);
                    });
                })
                ->where('tanggal', $tanggal)
                ->latest();
        } else {
            $data = Mutabaah::with('karyawan')
                ->when($request->bidang, function ($query) use ($request) {
                    $query->whereHas('karyawan.bidang', function ($q) use ($request) {
                        $q->where('id', $request->bidang);
                    });
                })
                ->where('tanggal', $tanggal)
                ->latest();
        }

        return Datatables::of($data)
            ->editColumn('no_induk', function ($data) {
                return '<span class="text-muted">' . $data->karyawan->no_induk . '</span>';
            })
            ->editColumn('nama_lengkap', function ($data) {
                
                return $data->karyawan->nama_lengkap;
            })
            ->editColumn('action', function ($data) { 
                return '
                <a href="Edit" class="bg-success text-white p-1 mr-2">Hapalan</> 
                <a href="Edit" class="bg-primary text-white p-1">Edit</>';
            })
          
            ->rawColumns(['no_induk', 'nama_lengkap', 'action']) 
            ->make(true);       
    }

    // Download Rekap Mutabaah Pegawai - Semua atau Unit
    public function unduh(Request $request)
    {
        $from = $request->date_start ? $request->date_start : Carbon::now()->subDays(7)->format('Y-m-d');
        $to = $request->date_end ? $request->date_end : Carbon::now()->format('Y-m-d');

        $export = new MutabaahPegawaiExport($from, $to, $request->bidang, $request->unit);

        return Excel::download($export, 'mutabaah_' . date('d-m-Y') . '_dari_' . $request->date_start . '_sampai_' . $request->date_end . '_.xlsx');
    }
}
