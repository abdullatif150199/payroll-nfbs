<?php

namespace App\Http\Controllers\Profile;

use Yajra\Datatables\Datatables;
// use Illuminate\Http\Request;
use App\Models\Gaji;

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
        $gaji = Gaji::with('karyawan')->findOrFail($id);

        return view('profile.gaji.detail', ['gaji' => $gaji]);
    }

    public function slip($id)
    {
        $data = Gaji::with(['karyawan', 'taxHistory'])->findOrFail($id);
        $potongan = $data->historyPotongan()->get();

        return view('profile.gaji.slip', [
            'data' => $data,
            'potongan' => $potongan
        ]);
    }
}
