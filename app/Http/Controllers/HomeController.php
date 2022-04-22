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
        $karyawan = Karyawan::query()
            ->active()
            ->select(
                'id',
                'nama_lengkap',
                'status_kerja_id',
                'golongan_id',
                'tanggal_masuk',
                'contract_expired',
                'created_at'
            )
            ->get();

        $bidang = Bidang::count();
        $unit = Unit::count();
        $golongan = Golongan::count();
        $kepala_keluarga = $karyawan
            ->where('jenis_kelamin', 'L')
            ->where('status_pernikahan', 'M')
            ->count();

        $cuti = Cuti::query()
            ->where('end_at', '>', now())
            ->count();

        $gajiTerisi = Gaji::query()
            ->where('bulan', date('Y-m'))
            ->count();

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
