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
        $juz = null;
        $sampaiHalaman = null;
        $halamanDiHapal = 0;

        if ($data->isNotEmpty()) {
            $hafalans = $data->first();
            $juz = $hafalans->juz;
            $sampaiHalaman = $hafalans->sampai_halaman;
        } else {
            $juz = 0;
            $sampaiHalaman = 0;
        }

        if ($juz == 1) {
            $startHalaman = 1;
            $endHalaman = 21;
        } elseif ($juz >= 2 && $juz <= 29) {
            $startHalaman = (($juz - 2) * 20) + 22;
            $endHalaman = (($juz - 1) * 20) + 21;
        } elseif ($juz == 30) {
            $startHalaman = 581;
            $endHalaman = 605;
        } else {
            $startHalaman = 0;
            $endHalaman = 0;
        }

        if ($juz === 0) {
            $halamanDiHapal = 0;
        } elseif ($juz == 30) {
            $halamanDiHapal = $sampaiHalaman - $startHalaman;
        } else  {
            $halamanDiHapal = $sampaiHalaman - $startHalaman + 1;
        }

        $sisaHalaman = $endHalaman - $sampaiHalaman;



        return view('profile.hafalan.index', [
            'data' => $data,
            'count' => $count,
            'juz' => $juz,
            'sisaHalaman' => $sisaHalaman,
            'halamanDiHapal' => $halamanDiHapal,
            'sampaiHalaman' => $sampaiHalaman
        ]);
    }

   

}