<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Models\Hapalan;
use Carbon\Carbon;

class HafalanController extends ProfileController
{
    public function index()
    {
        $count = Hapalan::with('karyawan')
            ->where('karyawan_id', $this->getId())
            ->whereBetween('tanggal', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();

        $data = Hapalan::with('karyawan')
            ->where('karyawan_id', $this->getId())
            ->latest('tanggal')
            ->simplePaginate(10);

        return view('profile.hafalan.index', [
            'data' => $data,
            'count' => $count
        ]);
    }

   

}