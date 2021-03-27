<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Karyawan;
use App\Models\NilaiKinerja;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Exports\GajiExport;
use Maatwebsite\Excel\Facades\Excel;

class GajiController extends Controller
{
    public function index()
    {
        $title = 'Daftar Gaji';
        return view('gaji.index', ['title' => $title]);
    }

    public function datatable(Request $request)
    {
        if (!$request->month) {
            $month = date('Y-m');
            $data = Gaji::with('karyawan')->where('bulan', $month)->get();
        } else {
            $data = Gaji::with('karyawan')->where('bulan', $request->month)->get();
        }

        return Datatables::of($data)
            ->editColumn('no_induk', function ($data) {
                return '<span class="text-muted">'. $data->karyawan->no_induk .'</span>';
            })
            ->editColumn('nama_lengkap', function ($data) {
                return $data->karyawan->nama_lengkap;
            })
            ->editColumn('gaji_pokok', function ($data) {
                return number_format($data->gaji_pokok);
            })
            ->editColumn('gatot', function ($data) {
                return number_format($data->gaji_total);
            })
            ->editColumn('lainnya', function ($data) {
                $lainnya = $data->lembur + $data->insentif + $data->lain_lain;
                return number_format($lainnya);
            })
            ->editColumn('tunjangan', function ($data) {
                $total_tunjangan = array_sum([
                    $data->tunjangan_jabatan,
                    $data->tunjangan_fungsional,
                    $data->tunjangan_struktural,
                    $data->tunjangan_kinerja,
                    $data->tunjangan_pendidikan,
                    $data->tunjangan_istri,
                    $data->tunjangan_anak
                ]);

                return number_format($total_tunjangan);
            })
            ->editColumn('potongan', function ($data) {
                return view('gaji.potongan', ['data' => $data]);
            })
            ->editColumn('gaji_akhir', function ($data) {
                return view('gaji.akhir', ['data' => $data]);
            })
            ->addColumn('actions', function ($data) {
                return view('gaji.actions', ['data' => $data]);
            })
            ->rawColumns(['actions', 'no_induk', 'nama_lengkap', 'gatot', 'gaji_akhir', 'tunjangan', 'gaji_pokok', 'lainnya', 'potongan'])
            ->make(true);
    }

    public function detail($id)
    {
        $gaji = Gaji::with('karyawan')->findOrFail($id);

        return $gaji;
    }

    // Calculate Gaji
    public function prosesUlang(Request $request)
    {
        $bln = $request->tahun .'-'. $request->bulan;
        $data = NilaiKinerja::all();

        foreach (Gaji::with('karyawan')->where('bulan', $bln)->cursor() as $gaji) {
            $tax = $gaji->karyawan->tax;
            $thr = 0;

            $gatot = array_sum([
                $gaji->karyawan->gaji_pokok,
                $gaji->karyawan->tunj_jabatan,
                $gaji->karyawan->tunj_struktural,
                $gaji->karyawan->tunj_fungsional,
                $gaji->karyawan->tunjKinerja($data, $bln),
                $gaji->karyawan->tunj_pendidikan_anak,
                $gaji->karyawan->tunj_istri,
                $gaji->karyawan->tunj_anak,
                $gaji->karyawan->lembur()->sumLembur($bln),
                $gaji->karyawan->insentif()->bulan($bln)->sum('jumlah')
            ]);

            $gaji_pertahun = $gatot * 12;
            $penghasilan_bruto = $gaji_pertahun + $thr;
            $biaya_jabatan = $tax->persentase_biaya_jabatan * $penghasilan_bruto;
            $penghasilan_neto = $penghasilan_bruto - $biaya_jabatan;
            $ptkp_pertahun = $tax->ptkp_pertahun;
            $pkp_pertahun = $penghasilan_neto > $ptkp_pertahun ? $penghasilan_neto - $ptkp_pertahun : 0;
            $pph21_pertahun = $tax->persentase_pph21 * $pkp_pertahun;
            $pph21_perbulan = $pph21_pertahun / 12;

            $new = $gaji->karyawan->gaji()->updateOrCreate([
                'bulan' => $bln,
            ], [
                'gaji_pokok' => $gaji->karyawan->gaji_pokok,
                'tunjangan_jabatan' => $gaji->karyawan->tunj_jabatan,
                'tunjangan_struktural' => $gaji->karyawan->tunj_struktural,
                'tunjangan_fungsional' => $gaji->karyawan->tunj_fungsional,
                'tunjangan_kinerja' => $gaji->karyawan->tunjKinerja($data, $bln),
                'tunjangan_pendidikan' => $gaji->karyawan->tunj_pendidikan_anak,
                'tunjangan_istri' => $gaji->karyawan->tunj_istri,
                'tunjangan_anak' => $gaji->karyawan->tunj_anak,
                'tunjangan_hari_raya' => $thr,
                'lembur' => $gaji->karyawan->lembur()->sumLembur($bln),
                // 'lain_lain' => 0,
                'insentif' => $gaji->karyawan->insentif()->bulan($bln)->sum('jumlah'),
                'gaji_total' => $gatot
            ]);

            // update atau create tax history
            $pajak = $gaji->taxHistory()->updateOrCreate([
                'id' => $gaji->taxHistory->id ?? null
            ], [
                'gaji_perbulan' => $gatot,
                'gaji_pertahun' => $gaji_pertahun,
                'thr' => $thr,
                'penghasilan_bruto' => $penghasilan_bruto,
                'biaya_jabatan' => $biaya_jabatan,
                'penghasilan_neto' => $penghasilan_neto,
                'ptkp_pertahun' => $ptkp_pertahun,
                'pkp_pertahun' => $pkp_pertahun,
                'pph21_pertahun' => $pph21_pertahun,
                'pph21_perbulan' => $pph21_perbulan
            ]);

            if ($new->historyPotongan->count() > 0) {
                $new->deleteHistoryPotongan();
            }

            $pot = $new->historyPotongan()->createMany($gaji->karyawan->potongan_array);
            $new->update([
                'gaji_akhir' => $gatot - ($pot->sum('jumlah') + $pajak->pph21_perbulan)
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Gaji terpilih berhasil diproses ualng'
        ]);
    }

    public function unduh(Request $request)
    {
        $bln = $request->tahun .'-'. $request->bulan;
        $export = new GajiExport($bln);

        return Excel::download($export, 'report.xlsx');
    }

    public function slip($id)
    {
        $data = Gaji::with(['karyawan', 'taxHistory'])->findOrFail($id);
        $potongan = $data->historyPotongan()->get();

        return view('gaji.slip', [
            'data' => $data,
            'potongan' => $potongan
        ]);
    }
}
