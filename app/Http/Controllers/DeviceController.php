<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Device;
use App\Libraries\EasyLink;

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
            ->editColumn('tipe', function($data) {
                return $data->tipe == '2' ? 'shift|non shift' : 'non shift';
            })
            ->addColumn('actions', function($data) {
                return view('device.actions', ['data' => $data]);
            })
            ->rawColumns(['tipe', 'actions'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'server_ip' => 'required',
            'server_port' => 'required',
            'serial_number' => 'required',
            'tipe' => 'required'
        ]);

        $data = [
            'server_ip' => $request->server_ip,
            'server_port' => $request->server_port,
            'serial_number' => $request->serial_number,
            'tipe' => $request->tipe
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
            'serial_number' => 'required',
            'tipe' => 'required'
        ]);

        $update = Device::find($id);
        $update->server_ip = $request->server_ip;
        $update->server_port = $request->server_port;
        $update->serial_number = $request->serial_number;
        $update->tipe = $request->tipe;
        $update->update();

        return $update;
    }

    public function destroy($id)
    {
        Device::destroy($id);

        return back();
    }

    public function check($id)
    {
        $get = Device::findOrFail($id);

        $finger = new EasyLink;
        $serial = $get->serial_number;
        $port = $get->server_port;
        $ip = $get->server_ip;

        try {
            $scanlogs = $finger->info($serial, $port, $ip);

            if ($scanlogs->Result === false) {
                return back()->withError('Device fingerprint tidak terhubung');
            };

            return back()->withSuccess('Device fingerprint terhubung');
        } catch (\Exception $e) {
            return back()->withError('Message: ' . $e->getMessage());
        }
    }
}
