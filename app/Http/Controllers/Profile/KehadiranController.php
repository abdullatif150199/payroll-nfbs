<?php

namespace App\Http\Controllers\Profile;

use App\Models\Kehadiran;

class KehadiranController extends ProfileController
{
    public function index()
    {
        $data = Kehadiran::with('karyawan')
            ->where('karyawan_id', $this->getId())
            ->latest('tanggal')
            ->simplePaginate(10);

        return view('profile.kehadiran.index', [
            'data' => $data
        ]);
    }
}
