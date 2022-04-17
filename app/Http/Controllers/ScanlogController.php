<?php

namespace App\Http\Controllers;

use App\Exports\ScanlogExport;
use App\Models\Device;
use App\Models\DeviceLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class ScanlogController extends Controller
{
    public function index()
    {
        $title = 'Scan Log';
        $devices = Device::pluck('keterangan', 'id');
        return view('scanlog.index', [
            'title' => $title,
            'devices' => $devices
        ]);
    }

    public function datatable(Request $request)
    {
        $tanggal = $request->tanggal ? $request->tanggal : date('Y-m-d');

        $data = DeviceLog::with('device')
            ->when($request->device, function ($query) use ($request) {
                $query->where('device_id', $request->device);
            })
            ->where('scan_at', $tanggal);

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

    public function unduh(Request $request)
    {
        $from = $request->dari_tanggal;
        $to = $request->sampai_tanggal;
        $export = new ScanlogExport($from, $to);

        return Excel::download($export, 'scanlog_' . date('d-m-Y') . '.xlsx');
    }
}
