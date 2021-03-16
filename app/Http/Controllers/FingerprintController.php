<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Libraries\EasyLink;
use App\Models\Device;

class FingerprintController extends Controller
{
    public function index()
    {
        return view('device.index');
    }

    public function datatable()
    {
        $data = Device::all();

        return Datatables::of($data)
            ->editColumn('keterangan', function ($data) {
                return view('device.tipe', ['data' => $data]);
            })
            ->addColumn('actions', function ($data) {
                return view('device.actions', ['data' => $data]);
            })
            ->rawColumns(['keterangan', 'actions'])
            ->make(true);
    }
}
