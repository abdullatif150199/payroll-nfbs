<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Device;

class DeviceController extends Controller
{
    public function index()
    {
        return view('device.index');
    }

    public function getDevice()
    {
        $data = Device::all();

        return Datatables::of($data)
            ->addColumn('actions', function($data) {
                return view('device.actions', ['data' => $data]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'server_ip' => 'required',
            'server_port' => 'required',
            'serial_number' => 'required'
        ]);

        $data = [
            'server_ip' => $request->server_ip,
            'server_port' => $request->server_port,
            'serial_number' => $request->serial_number
        ];

        $store = Device::create($data);

        return $store;
    }

    public function edit($id)
    {
        $get = Device::find($id);
        return $get;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'server_ip' => 'required',
            'server_port' => 'required',
            'serial_number' => 'required'
        ]);

        $update = Device::find($id);
        $update->server_ip = $request->server_ip;
        $update->server_port = $request->server_port;
        $update->serial_number = $request->serial_number;
        $update->update();

        return $update;
    }

    public function destroy($id)
    {
        Device::destroy($id);

        return back();
    }
}
