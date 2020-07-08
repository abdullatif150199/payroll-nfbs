<?php

namespace App\Jobs;

use App\Models\Karyawan;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessPayroll implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $karyawan;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Karyawan $karyawan)
    {
        $this->karyawan = $karyawan;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $karyawan->gaji()->firstOrNew([
            'bulan' => $bln,
        ],[
            'gaji_pokok' => $karyawan->gaji_pokok,
            'tunjangan_jabatan' => $karyawan->tunj_struktural,
            'tunjangan_fungsional' => $karyawan->tunj_fungsional,
            'tunj_pendidikan' => $karyawan->tunj_pendidikan_anak,
            'tunjangan_istri' => $karyawan->tunj_istri,
            'tunjangan_anak' => $karyawan->tunj_anak,
            'tunjangan_hari_raya' => $karyawan->tunj_hari_raya,
            'lembur' => $this->hitungLembur($karyawan, $bln),
            'lain_lain' => 0,
            'insentif' => $karyawan->insentif()->bulan($bln)->sum('jumlah'),
            'potongan' => $this->potongan($karyawan),
            'gaji_total' => $this->gatot($karyawan, $bln)
        ]);
    }
}
