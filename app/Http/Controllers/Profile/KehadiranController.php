<?php

namespace App\Http\Controllers\Profile;

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Models\Kehadiran;

class KehadiranController extends ProfileController
{
    public function index()
    {
        return view('profile.kehadiran.index', ['id' => $this->getId()]);
    }

    public function datatable($id)
    {
        $data = Kehadiran::with('karyawan')
                ->where('karyawan_id', $id)->get();

        return Datatables::of($data)
            ->editColumn('jumlah_jam', function($data) {
                if ($data->karyawan->tipe_kerja !== 'shift') {
                    $result = sum_time(
                        $data->jam_masuk,
                        $data->jam_istirahat,
                        $data->jam_kembali,
                        $data->jam_pulang
                    ) ?? '<span class="tag tag-rounded tag-red">Undefined</span>';
                } else {
                    $result = sum_time_shift(
                        $data->jam_masuk,
                        $data->jam_pulang
                    ) ?? '<span class="tag tag-rounded tag-red">Undefined</span>';
                }

                return $result;
            })
            ->editColumn('tanggal', function($data) {
                return '<span class="text-muted">'. date('d M Y', strtotime($data->tanggal)) .'</span>';
            })
            ->rawColumns(['jumlah_jam', 'tanggal'])
            ->make(true);
    }
}
