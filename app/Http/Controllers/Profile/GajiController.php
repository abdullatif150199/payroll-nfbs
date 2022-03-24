<?php

namespace App\Http\Controllers\Profile;

use Yajra\Datatables\Datatables;
// use Illuminate\Http\Request;
use App\Models\Gaji;
use App\Models\NilaiKinerja;

class GajiController extends ProfileController
{
    public function index()
    {
        $data = Gaji::with('karyawan')
            ->where('karyawan_id', $this->getId())
            ->where('approved', 'Y')->simplePaginate(10);

        return view('profile.gaji.index', ['data' => $data]);
    }

    public function detail($id)
    {
        $gaji = Gaji::with('karyawan', 'historyKinerja', 'historyPotongan')
            ->where('karyawan_id', $this->getId())
            ->findOrFail($id);
        $nilker = $gaji->nilaiKinerja(NilaiKinerja::get());
        $insentif = $gaji->karyawan->insentif()->bulan($gaji->bulan)->get();

        return view('profile.gaji.detail', [
            'gaji' => $gaji,
            'nilKer' => $nilker,
            'insentif' => $insentif
        ]);
    }

    public function slip($id)
    {
        $data = Gaji::with(['karyawan', 'taxHistory'])
            ->where('karyawan_id', $this->getId())
            ->findOrFail($id);
        $potongan = $data->historyPotongan()->get();

        return view('profile.gaji.slip', [
            'data' => $data,
            'potongan' => $potongan
        ]);
    }
}
