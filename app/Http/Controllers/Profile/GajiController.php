<?php

namespace App\Http\Controllers\Profile;

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Models\Gaji;

class GajiController extends ProfileController
{
    public function index()
    {
        return view('profile.gaji.index', ['id' => $this->getId()]);
    }

    public function datatable($id)
    {
        $data = Gaji::with('karyawan')
                ->where('karyawan_id', $id)->get();

        return Datatables::of($data)
            ->editColumn('bulan', function ($data) {
                return '<span class="text-muted">'. yearMonth($data->bulan, 'H') .'</span>';
            })
            ->editColumn('gaji_akhir', function ($data) {
                return number_format($data->gaji_total);
            })
            ->addColumn('actions', function ($data) {
                return view('profile.gaji.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'bulan', 'gaji_akhir'])
            ->make(true);
    }

    public function detail($id)
    {
        $gaji = Gaji::with('karyawan')->findOrFail($id);

        return view('profile.gaji.detail', ['gaji' => $gaji]);
    }

    public function slip($id)
    {
        $data = Gaji::with('karyawan')->findOrFail($id);
        $data->pendapatan = array_sum([
            $data->gaji_pokok,
            $data->tunjangan_jabatan,
            $data->tunjangan_struktural,
            $data->tunjangan_fungsional,
            $data->tunjangan_kinerja,
            $data->tunjangan_pendidikan_anak,
            $data->tunjangan_istri,
            $data->tunjangan_anak,
            $data->lembur,
            $data->insentif
        ]);

        $potongan = $data->historyPotongan()->get();

        return view('profile.gaji.slip', [
            'data' => $data,
            'potongan' => $potongan
        ]);
    }
}
