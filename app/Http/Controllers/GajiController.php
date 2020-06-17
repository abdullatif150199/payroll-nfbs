<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Karyawan;
use App\Models\Gaji;

class GajiController extends Controller
{
    public function index()
    {
        $title = 'Daftar Gaji';
        return view('gaji.index', ['title' => $title]);
    }

    public function getGaji(Request $request)
    {
        if (!$request->month) {
            $month = date('Y-m');
            $data = Gaji::with('karyawan')->where('bulan', $month)->get();
        } else {
            $data = Gaji::with('karyawan')->where('bulan', $request->month)->get();
        }

        return Datatables::of($data)
            ->editColumn('no_induk', function($data) {
                return '<span class="text-muted">'. $data->karyawan->no_induk .'</span>';
            })
            ->editColumn('nama_lengkap', function($data) {
                return $data->karyawan->nama_lengkap;
            })
            ->editColumn('gaji_pokok', function($data) {
                return number_format($data->gaji_pokok);
            })
            ->editColumn('lembur', function($data) {
                return number_format($data->lembur);
            })
            ->editColumn('insentif', function($data) {
                return number_format($data->insentif);
            })
            ->editColumn('lain_lain', function($data) {
                return number_format($data->lain_lain);
            })
            ->editColumn('tunjangan', function($data) {
                $total_tunjangan = $data->tunjangan_istri + $data->tunjangan_anak + $data->tunjangan_pendidikan + $data->tunjangan_jabatan;
                return number_format($total_tunjangan);
            })
            ->editColumn('potongan', function($data) {
                return number_format($data->potongan);
            })
            ->editColumn('gaji_akhir', function($data) {
                return number_format($data->gaji_akhir);
            })
            ->addColumn('actions', function($data) {
                return view('gaji.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'no_induk', 'nama_lengkap', 'gaji_akhir', 'tunjangan', 'gaji_pokok', 'lembur', 'insentif', 'lain_lain', 'potongan'])
            ->make(true);
    }

    // Calculate Gaji
    public function calculate(Request $request)
    {
        $bln = $request->tahun .'-'. $request->bulan;
        foreach (Karyawan::whereIn('status', ['1','2'])->cursor() as $data) {
            dd($data->nama_lengkap .' - '. $data->insentif()->bulan($bln)->sum('jumlah'));
            $data->gaji()->create([
                'bulan' => $bln,
                'gaji_pokok' => $data->gaji_pokok,
                'tunjangan_jabatan' => $data->tunj_struktural,
                'tunjangan_fungsional' => $data->tunj_fungsional,
                'tunj_pendidikan' => $data->tunj_pendidikan_anak,
                'tunjangan_istri' => $data->tunj_istri,
                'tunjangan_anak' => $data->tunj_anak,
                'tunjangan_hari_raya' => $data->tunj_hari_raya,
                'lembur' => $this->hitungLembur($data, $bln),
                'lain_lain' => 0,
                'insentif' => $data->insentif()->bulan($bln)->sum('jumlah'),
                'potongan' => $this->potongan($data),
                'gaji_total' => $this->gatot($data, $bln)
            ]);
        }
    }

    // Get poTongan Karyawan $data == Karyawan
    public function potongan($data)
    {
        foreach ($data->potongan as $item) {
            if ($item->type == 'percent') {
                $arr = explode('*', $item->jumlah_potongan);
                if ($arr[1] == 'GATOT') {
                    $jml = $arr[0] * $data->gaji_total;
                } else {
                    $jml = $arr[0] * $data->gaji_pokok;
                }
            }
        }
    }

    // Get Gatot $data == Karyawan
    public function gatot($data, $bln)
    {
        $gatot = $data->gaji_pokok +
            $data->tunj_jabatan +
            $data->tunj_struktural +
            $data->tunj_fungsional +
            $data->tunj_pendidikan_anak +
            $data->tunj_istri +
            $data->tunj_anak +
            $data->tunj_hari_raya +
            $this->hitungLembur($data, $bln) +
            $data->lain_lain +
            $data->insentif()->bulan($bln)->sum('jumlah');

        return $gatot;
    }

    // Perhitungan Lembur
    // Berdasarkan aturan Depnaker
    // Maksimal jam lembur dibatasi saat input
    public function hitungLembur($data, $bln)
    {
        $lembur = $data->lembur()->bulan($bln)->get();
        // Gatot lembur == gapok+TUNTAP+TUNTATAP
        $gatot = $data->gaji_pokok +
            $data->tunj_struktural +
            $data->tunj_fungsional +
            $data->tunj_pendidikan_anak +
            $data->tunj_istri +
            $data->tunj_anak +
            $data->tunj_jabatan;

        // LEMBUR DIHARI BIASA
        $day_row = $lembur->where('type', 'day')->count();
        if ($day_row > 0) {
            $day_jml_jam = $lembur->where('type', 'day')->sum('jumlah_jam_lembur');
            // Jam pertama
            $day_jam_pertama = $day_row*1.5*1/173*(0.75*$gatot);
            // jam kedua dan seterusnya
            $day_jam_berikutnya = ($day_jml_jam-$day_row)*2*1/173*(0.75*$gatot);
            $day_jml = $day_jam_pertama + $day_jam_berikutnya;
        } else {
            $day_jml = 0;
        }

        // LEMBUR DIHARI LIBUR
        $week_row = $lembur->where('type', 'week')->count();
        if ($week_row > 0) {
            $week_jml_jam = $lembur->where('type', 'week')->sum('jumlah_jam_lembur');
            // 7 jam Pertama
            // Jam ke 8
            // Jam ke 9 dan seterusnya
            if ($week_jml_jam <= 7) {
                // 7 Jam pertama
                $week_jam_pertama = $week_jml_jam*2*1/173*(0.75*$gatot);
                $week_jam_kedelapan = 0;
                $week_jam_berikutnya = 0;
            } else {
                // Jam ke 9 dan seterusnya
                if ($week_jml_jam > 8) {
                    $week_jam_pertama = 7*2*1/173*(0.75*$gatot);
                    $week_jam_kedelapan = 1*3*1/173*(0.75*$gatot);
                    $week_jam_berikutnya = ($week_jml_jam-8)*4*1/173*(0.75*$gatot);
                } else {
                    // Jam ke 8
                    $week_jam_pertama = 7*2*1/173*(0.75*$gatot);
                    $week_jam_kedelapan = 1*3*1/173*(0.75*$gatot);
                    $week_jam_berikutnya = 0;
                }

            }

            $week_jml = $week_jam_pertama + $week_jam_kedelapan + $week_jam_berikutnya;
        } else {
            $week_jml = 0;
        }

        // LEMBUR DIHARI LIBUR NASIONAL
        $holi_row = $lembur->where('type', 'holi')->count();
        if ($holi_row > 0) {
            $holi_jml_jam = $lembur->where('type', 'holi')->sum('jumlah_jam_lembur');
            // 5 jam Pertama
            // Jam ke 6
            // Jam ke 7 dan seterusnya
            if ($holi_jml_jam <= 5) {
                // 7 Jam pertama
                $holi_jam_pertama = $holi_jml_jam*2*1/173*(0.75*$gatot);
                $holi_jam_keenam = 0;
                $holi_jam_berikutnya = 0;
            } else {
                // Jam ke 7 dan seterusnya
                if ($holi_jml_jam > 6) {
                    $holi_jam_pertama = 5*2*1/173*(0.75*$gatot);
                    $holi_jam_keenam = 1*3*1/173*(0.75*$gatot);
                    $holi_jam_berikutnya = ($holi_jml_jam-8)*4*1/173*(0.75*$gatot);
                } else {
                    // Jam ke 6
                    $holi_jam_pertama = 5*2*1/173*(0.75*$gatot);
                    $holi_jam_keenam = 1*3*1/173*(0.75*$gatot);
                    $holi_jam_berikutnya = 0;
                }

            }

            $holi_jml = $holi_jam_pertama + $holi_jam_keenam + $holi_jam_berikutnya;
        } else {
            $holi_jml = 0;
        }

        // HASIL PENDAPATAN LEMBUR DALAM 1BULAN
        $result = $day_jml + $week_jml + $holi_jml;
        return round($result, 2);
    }
}
