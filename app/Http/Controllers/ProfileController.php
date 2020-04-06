<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\Http\Requests\CutiRequest;
use App\Models\Kehadiran;
use App\Models\Cuti;
use App\Models\Gaji;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function kehadiran()
    {
        $id = Auth::user()->karyawan->id;
        return view('profile.kehadiran.index', compact('id'));
    }

    public function getKehadiran($id)
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

    public function cuti()
    {
        $id = Auth::user()->karyawan->id;
        return view('profile.cuti.index', compact('id'));
    }

    public function createCuti()
    {
        return view('profile.cuti.create');
    }

    public function storeCuti(CutiRequest $request)
    {
        $request->merge(['karyawan_id' => Auth::user()->karyawan->id]);
        Cuti::create($request->all());

        return redirect()->route('profile.cuti')
                ->with('success', 'Request berhasil di buat!');
    }

    public function editCuti($id)
    {
        $data = Cuti::findOrFail($id);
        return view('profile.cuti.create', compact($data));
    }

    public function getCuti($id)
    {
        $data = Cuti::with('karyawan')->where('karyawan_id', $id)->get();

        return Datatables::of($data)
            ->editColumn('status', function($data) {
                if ($data->approved_at === null) {
                    return ($data->status === null) ? '<span class="tag tag-blue tag-rounded">Menunggu</span>' : '<span class="tag tag-rounded">Ditolak</span>' ;
                } else {
                    return '<span class="tag tag-green tag-rounded">Diterima</span>';
                }

            })
            ->addColumn('progress', function($data) {
                return view('profile.cuti.progress', ['data' => $data]);
            })
            ->editColumn('tgl_request', function($data) {
                return '<span class="text-muted">'. date('d M Y', strtotime($data->created_at)) .'</span>';
            })
            ->rawColumns(['status', 'progress', 'tgl_request'])
            ->make(true);
    }

    public function gaji()
    {
        $id = Auth::user()->karyawan->id;
        return view('profile.gaji.index', compact('id'));
    }

    public function getGaji($id)
    {
        $data = Gaji::with('karyawan')
                ->where('karyawan_id', $id)->get();

        return Datatables::of($data)
            ->editColumn('bulan', function($data) {
                return '<span class="text-muted">'. yearMonth($data->bulan) .'</span>';
            })
            ->editColumn('gaji_akhir', function($data) {
                return number_format($data->gaji_akhir);
            })
            ->addColumn('actions', function($data) {
                return view('profile.gaji.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'bulan', 'gaji_akhir'])
            ->make(true);
    }

    public function messages()
    {
        return view('profile.messages.index');
    }

}
