<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Bidang;
use App\Unit;
use App\Golongan;
use App\Cuti;
use App\Charts\KaryawanChart;

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
        $karyawan = Karyawan::count();
        $bidang = Bidang::count();
        $unit = Unit::count();
        $golongan = Golongan::count();
        $kepala_keluarga = Karyawan::where('jenis_kelamin', 'L')->where('status_pernikahan', 'M')->count();
        $now = date('Y-m-d H:i:s');
        $cuti = Cuti::where('end_at', '>', $now)->count();

        $chart = new KaryawanChart;
        $chart->dataset('My dataset', 'pie', [1, 2, 3, 4]);
        $chart->labels(['One', 'Two', 'Three', 'Four']);

        return view('home', [
            'karyawan' => $karyawan,
            'bidang' => $bidang,
            'unit' => $unit,
            'golongan' => $golongan,
            'kepala_keluarga' => $kepala_keluarga,
            'cuti' => $cuti,
            'title' => $title,
            'chart' => $chart
        ]);
    }
}
