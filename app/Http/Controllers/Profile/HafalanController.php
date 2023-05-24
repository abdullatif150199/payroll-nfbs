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
            ->latest()->simplePaginate(10);

        $hafalans = null;
        $juzTerakhir = null;
        $halamanTerakhir = null;

        if ($data->isNotEmpty()) {
            $hafalans = $data->first();
            $juzTerakhir = $hafalans->juz;
            $halamanTerakhir = $hafalans->sampai_halaman;
        } else {
            $juzTerakhir = 0;
        }

        if ($juzTerakhir >= 1 && $juzTerakhir <= 29) {
            $jumlahHalaman = 20;
        } elseif ($juzTerakhir == 30) {
            $jumlahHalaman = 22;
        } else {
            $jumlahHalaman = 0; 
        }
        $sisaHalaman = $jumlahHalaman -  $halamanTerakhir;



        return view('profile.hafalan.index', [
            'data' => $data,
            'count' => $count,
            'juzTerakhir' => $juzTerakhir,
            'sisaHalaman' => $sisaHalaman
        ]);
    }

   

}