<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\DeviceLog;
use Yajra\DataTables\DataTables;

class ScanlogController extends Controller
{
    public function index()
    {
        $title = 'Scan Log';
        $bidang = Bidang::pluck('nama_bidang', 'id');
        return view('scanlog.index', [
            'title' => $title,
            'bidang' => $bidang
        ]);
    }

    public function datatable()
    {
        $data = DeviceLog::with('device');

        return Datatables::of($data)
            ->editColumn('jam_scan', function ($data) {
                return date('H:i', strtotime($data->scan_at));
            })
            ->editColumn('tgl_scan', function ($data) {
                return date('d-m-Y', strtotime($data->scan_at));
            })
            ->editColumn('tempat', function ($data) {
                return $data->device->keterangan ?? null;
            })
            ->rawColumns(['jam_scan', 'tgl_scan'])
            ->make(true);
    }
}
