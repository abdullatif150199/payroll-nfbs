<?php

namespace App\Http\Controllers\Profile;

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Models\Kehadiran;

class KehadiranController extends ProfileController
{
    public function index()
    {
        $data = Kehadiran::with('karyawan')
                ->where('karyawan_id', $this->getId())
                ->paginate(10);

        return view('profile.kehadiran.index', [
            'data' => $data
        ]);
    }
}
