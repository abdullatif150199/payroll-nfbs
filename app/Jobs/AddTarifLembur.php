<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Models\TarifLembur;

class AddTarifLembur implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $karyawan;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($karyawan)
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
        $gol = $this->karyawan->golongan->kode_golongan;
        $kel = $this->karyawan->kelompokKerja->grade;

        $tarif = TarifLembur::where('golongan', $gol[0])->where('kelompok', $kel)->first();
        if (!$tarif) {
            Log::alert('Tarif lembur tidak ditemukan atau golongan/kelompok tidak sesuai, karyawan_id: ' . $this->karyawan->id);
        }

        $this->karyawan->update([
            'tarif_lembur_id' => $tarif->id
        ]);
        Log::info('Tarif Lembur berhasil ditambahkan');
    }
}
