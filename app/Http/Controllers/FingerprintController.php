<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Libraries\EasyLink;
use App\Models\Device;
use App\Models\Karyawan;

class FingerprintController extends Controller
{
    public function index()
    {
        return view('device.fingerprint.index');
    }

    public function datatable()
    {
        $data = Karyawan::with('fingerprint')->get();

        return Datatables::of($data)
            ->editColumn('sidik_jari', function ($data) {
                return $data->fingerprint->tmp ?? '[kosong]';
            })
            ->addColumn('actions', function ($data) {
                return view('device.fingerprint.actions', ['data' => $data]);
            })
            ->rawColumns(['sidik_jari', 'actions'])
            ->make(true);
    }

    public function upload()
    {
        $kar = Karyawan::findOrFail(1);

        try {
            $finger = new EasyLink;
            $arr['serial'] = '61627018290363';
            $arr['pin'] = $kar->no_induk;
            $arr['nama'] = $kar->nama_lengkap;
            $arr['pwd'] = 0;
            $arr['rfid'] = 0;
            $arr['priv'] = 0;
            $arr['tmp'] = 0;
            $scanlogs = $finger->upload($arr);

            if ($scanlogs->Result === false) {
                return back()->withError('Device fingerprint tidak terhubung');
            };

            return back()->withSuccess('Device fingerprint terhubung');
        } catch (\Exception $e) {
            return back()->withError('Message: ' . $e->getMessage());
        }
    }
}
