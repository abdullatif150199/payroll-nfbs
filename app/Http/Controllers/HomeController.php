<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Bidang;
use App\Models\Unit;
use App\Models\Golongan;
use App\Models\Cuti;
use App\Models\Gaji;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';
        $karyawanQuery = Karyawan::query()
            ->where('status', '<>', '3');

        $karyawan = $karyawanQuery->get();
        $bidang = Bidang::count();
        $unit = Unit::count();
        $golongan = Golongan::count();
        $kepala_keluarga = $karyawanQuery->where('jenis_kelamin', 'L')
            ->where('status_pernikahan', 'M')
            ->count();
        $now = date('Y-m-d H:i:s');
        $cuti = Cuti::where('end_at', '>', $now)->count();

        $gajiTerisi = Gaji::where('bulan', date('Y-m'))->count();
        $barChart = $karyawan->groupBy('status_kerja_id');
        $pieChart = $karyawan->groupBy('golongan_id');
        $kontrak = $karyawan->where('contract_expired', '>=', now());

        return view('home', [
            'karyawan' => $karyawan,
            'bidang' => $bidang,
            'unit' => $unit,
            'golongan' => $golongan,
            'kepala_keluarga' => $kepala_keluarga,
            'cuti' => $cuti,
            'title' => $title,
            'gajiTerisi' => $gajiTerisi,
            'barChart' => $barChart,
            'pieChart' => $pieChart,
            'kontrak' => $kontrak
        ]);
    }

    public function toLogin()
    {
        return redirect()->route('login');
    }

    public function markAsRead(Request $request)
    {
        auth()->user()->unreadNotifications
            ->when($request->id, function ($query) use ($request) {
                return $query->where('id', $request->id);
            })
            ->markAsRead();

        return response()->noContent();
    }

    public function coming()
    {
        return view('soon');
    }
}
