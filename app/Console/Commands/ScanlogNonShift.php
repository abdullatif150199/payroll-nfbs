<?php

namespace App\Console\Commands;

use App\Jobs\ScanlogJob;
use Illuminate\Console\Command;
use App\Libraries\EasyLink;
use App\Models\Karyawan;
use App\Models\Device;
use App\Models\ApelDay;
use Illuminate\Support\Facades\Log;

class ScanlogNonShift extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scanlog:nonshift';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get new scanlog from fingerprint on time non Shift';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $jam = [

            'datang_subuh_min' => strtotime('04:30:00'),
            'datang_subuh_max' => strtotime('05:30:00'),
            'pulang_subuh_min' => strtotime('05:40:00'),
            'pulang_subuh_max' => strtotime('06:29:00'),
            'masuk_min' => strtotime('06:30:00'),
            'masuk_max' => strtotime('10:30:00'),
            'kembali_min' => strtotime('12:45:00'),
            'kembali_max' => strtotime('14:30:00'),
            'pulang_min' => strtotime('14:30:00'),
            'pulang_max' => strtotime('17:00:00'),
            'datang_malam_min' => strtotime('18:00:00'),
            'datang_malam_max' => strtotime('18:45:00'),
            'pulang_malam_min' => strtotime('19:00:00'),
            'pulang_malam_max' => strtotime('20:30:00'),
        ];

        $finger = new EasyLink;
        $devices = Device::whereIn('tipe', ['1', '3'])->get();
        // $ioMode = ['1' => 'masuk', '2' => 'istirahat', '3' => 'kembali', '4' => 'pulang'];
        foreach ($devices as $device) {
            $serial = $device->serial_number;
            $scanlogs = $finger->newScan($serial);
            // kalo False
            if (!$scanlogs->Result) {
                // Log::critical("Diskonek", ["sn" => $serial]);
                continue;
            }

            foreach ($scanlogs->Data as $scan) {
                $scanTime = strtotime(date('H:i:s', strtotime($scan->ScanDate)));
                $karyawan = Karyawan::where('no_induk', $scan->PIN)->first();

                $muhafidz = Karyawan::whereHas('bidang', function ($query) {
                    $query->where('nama_bidang', 'muhafidz');
                })->pluck('no_induk')->
                toArray();

                if (!$karyawan) {
                    continue;
                }

                // Simpan Log
                ScanlogJob::dispatch($scan, $karyawan);

                  // Masuk subuh-- ini nih

             if ($scanTime >= $jam['datang_subuh_min'] && $scanTime < $jam['datang_subuh_max']) {
                if(in_array($karyawan->no_induk, $muhafidz)) {
                    $karyawan->kehadiranMuhafidz()->firstOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'datang_subuh' => date('H:i:s', strtotime($scan->ScanDate))
                    ]);
                }
            }

            // pulang subuh
            if ($scanTime >= $jam['pulang_subuh_min'] && $scanTime < $jam['pulang_subuh_max']) {
                if(in_array($karyawan->no_induk, $muhafidz)) {
                    $karyawan->kehadiranMuhafidz()->updateOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'pulang_subuh' => date('H:i:s', strtotime($scan->ScanDate))
                    ]);
                }
            }




                // Masuk -- ini nih
                if ($scanTime >= $jam['masuk_min'] && $scanTime < $jam['masuk_max']) {
                    if ($scan->PIN == "220289") {
                        goto apel;
                    }

                    $karyawan->kehadiran()->firstOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate))
                    ]);
                }

                /* == ini sudah tidak digunakan ===

                // Istirahat
                $start = strtotime('10:30:00');
                $end = strtotime('12:45:00');
                if ($scanTime >= $start && $scanTime < $end) {
                    $karyawan->kehadiran()->updateOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'jam_istirahat' => date('H:i:s', strtotime($scan->ScanDate))
                    ]);

                    continue;
                }

                == karena kebijakan baru dari hrd == */

                // Kembali
                if ($scanTime >= $jam['kembali_min'] && $scanTime < $jam['kembali_max']) {

                    $karyawan->kehadiran()->updateOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'jam_kembali' => date('H:i:s', strtotime($scan->ScanDate)),
                        'jam_istirahat' => '12:00:00'
                    ]);

                    continue;
                }

                // Pulang
                if ($scanTime >= $jam['pulang_min'] && $scanTime < $jam['pulang_max']) {
                    if ($scanTime >= strtotime(setting('jam_pulang_kerja_nonshift'))) {
                        $scanTime = setting('jam_pulang_kerja_nonshift');
                    } else {
                        $scanTime = date('H:i:s', strtotime($scan->ScanDate));
                    }

                    $karyawan->kehadiran()->updateOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'jam_pulang' => $scanTime
                    ]);

                    continue;
                }

                         // datang malam
            if ($scanTime >= $jam['datang_malam_min'] && $scanTime < $jam['datang_malam_max']) {
                if(in_array($karyawan->no_induk, $muhafidz)) {
                    $karyawan->kehadiranMuhafidz()->updateOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'datang_malam' => date('H:i:s', strtotime($scan->ScanDate))
                    ]);
                }
            }

            // pulang malam
            if ($scanTime >= $jam['pulang_malam_min'] && $scanTime < $jam['pulang_malam_max']) {
                if(in_array($karyawan->no_induk, $muhafidz)) {
                    $karyawan->kehadiranMuhafidz()->updateOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'pulang_malam' => date('H:i:s', strtotime($scan->ScanDate))
                    ]);
                }
            }

                // device apel
                apel:
                $apelDay = ApelDay::where('day_name', date('l'))->first();
                if ($device->tipe == '3' && $apelDay) {
                    $start = strtotime($apelDay->start_time_at . '- 30 minutes');
                    $end = strtotime($apelDay->end_time_at);
                    // apakah hadir dijam apel
                    if ($scanTime >= $start && $scanTime <= $end) {
                        $karyawan->attendanceApel()->updateOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'hari' => date('l'),
                            'masuk' => date('H:i:s', strtotime($scan->ScanDate))
                        ]);
                    }
                }
            }
        }
    }
}
