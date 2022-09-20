<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Libraries\EasyLink;
use App\Models\Device;

class DeviceController extends Controller
{
    public function index()
    {
        return view('device.index');
    }

    public function datatable()
    {
        $data = Device::all();

        return Datatables::of($data)
            ->editColumn('server_ip', function ($data) {
                return setting('fingerprint_server_ip');
            })
            ->editColumn('server_port', function ($data) {
                return setting('fingerprint_server_port');
            })
            ->editColumn('keterangan', function ($data) {
                return view('device.tipe', ['data' => $data]);
            })
            ->addColumn('actions', function ($data) {
                return view('device.actions', ['data' => $data]);
            })
            ->rawColumns(['keterangan', 'actions'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'serial_number' => 'required',
            'tipe' => 'required'
        ]);

        $data = [
            'serial_number' => $request->serial_number,
            'tipe' => $request->tipe,
            'keterangan' => $request->keterangan
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
            'serial_number' => 'required',
            'tipe' => 'required'
        ]);

        $update = Device::find($id);
        $update->serial_number = $request->serial_number;
        $update->tipe = $request->tipe;
        $update->keterangan = $request->keterangan;
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
        try {
            $get = Device::findOrFail($id);            
            $finger = new EasyLink;
            $scanlogs = $finger->info($get->serial_number);

            if ($scanlogs->Result === false) {
                return back()->withError('Device fingerprint tidak terhubung');
            };

            return back()->withSuccess('Device fingerprint terhubung');
        } catch (\Exception $e) {
            return back()->withError('Message: ' . $e->getMessage());
        }
    }
}
