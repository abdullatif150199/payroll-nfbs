<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\NilaiKinerja;
use App\Models\Karyawan;

class ProcessPayroll implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $karyawan;
    protected $bln;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Karyawan $karyawan, $bln)
    {
        $this->karyawan = $karyawan;
        $this->bln = $bln;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = NilaiKinerja::all();
        $tax = $this->karyawan->tax;
        $thr = 0; //$this->karyawan->tunj_hari_raya

        $gatot = array_sum([
            $this->karyawan->gaji_pokok,
            $this->karyawan->tunj_jabatan,
            $this->karyawan->tunj_struktural,
            $this->karyawan->tunj_fungsional,
            $this->karyawan->tunjKinerja($data, $this->bln),
            $this->karyawan->tunj_pendidikan_anak,
            $this->karyawan->tunj_istri,
            $this->karyawan->tunj_anak,
            $this->karyawan->lembur()->sumLembur($this->bln),
            $this->karyawan->insentif()->bulan($this->bln)->sum('jumlah')
        ]);

        $gaji_pertahun = $gatot * 12;
        $penghasilan_bruto = $gaji_pertahun + $thr;
        $biaya_jabatan = $tax->persentase_biaya_jabatan * $penghasilan_bruto;
        $penghasilan_neto = $penghasilan_bruto - $biaya_jabatan;
        $ptkp_pertahun = $tax->ptkp_pertahun;
        $pkp_pertahun = $penghasilan_neto > $ptkp_pertahun ? $penghasilan_neto - $ptkp_pertahun : 0;
        $pph21_pertahun = $tax->persentase_pph21 * $pkp_pertahun;
        $pph21_perbulan = $pph21_pertahun / 12;

        $gaji = $this->karyawan->gaji()->updateOrCreate([
            'bulan' => $this->bln,
        ], [
            'rekening_id' => ($this->karyawan->pembayaran == 'cash' ? config('var.rekening_cash_id') : config('var.rekening_transfer_id')),
            'gaji_pokok' => $this->karyawan->gaji_pokok,
            'tunjangan_jabatan' => $this->karyawan->tunj_jabatan,
            'tunjangan_struktural' => $this->karyawan->tunj_struktural,
            'tunjangan_fungsional' => $this->karyawan->tunj_fungsional,
            'tunjangan_kinerja' => $this->karyawan->tunjKinerja($data, $this->bln),
            'tunjangan_pendidikan' => $this->karyawan->tunj_pendidikan_anak,
            'tunjangan_istri' => $this->karyawan->tunj_istri,
            'tunjangan_anak' => $this->karyawan->tunj_anak,
            'tunjangan_hari_raya' => $thr,
            'lembur' => $this->karyawan->lembur()->sumLembur($this->bln),
            // 'lain_lain' => 0,
            'insentif' => $this->karyawan->insentif()->bulan($this->bln)->sum('jumlah'),
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

        // hapus semua history potongan sebelum di update
        if ($gaji->historyPotongan->count() > 0) {
            $gaji->deleteHistoryPotongan();
        }

        $pot = $gaji->historyPotongan()->createMany($this->karyawan->potongan_array);
        $gaji->update([
            'gaji_akhir' => $gatot - ($pot->sum('jumlah') + $pajak->pph21_perbulan)
        ]);
    }

    // Perhitungan Lembur
    // Berdasarkan aturan Depnaker
    // Maksimal jam lembur dibatasi saat input
    private function hitungLembur($data, $bln)
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
