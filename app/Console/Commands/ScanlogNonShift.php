<?php

namespace App\Console\Commands;

use App\Jobs\ScanlogJob;
use Illuminate\Console\Command;
use App\Libraries\EasyLink;
use App\Models\Karyawan;
use App\Models\Device;
use App\Models\ApelDay;

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
        $finger = new EasyLink;
        $devices = Device::whereIn('tipe', ['1', '3'])->get();
        // $ioMode = ['1' => 'masuk', '2' => 'istirahat', '3' => 'kembali', '4' => 'pulang'];        
        foreach ($devices as $device) {
            $serial = $device->serial_number;
            $scanlogs = $finger->newScan($serial);
            // kalo False
            if (!$scanlogs->Result) {
                continue;
            }

            foreach ($scanlogs->Data as $scan) {
                $scanTime = strtotime(date('H:i:s', strtotime($scan->ScanDate)));
                $karyawan = Karyawan::where('no_induk', $scan->PIN)->first();
                if (!$karyawan) {
                    continue;
                }

                // Simpan Log
                ScanlogJob::dispatch($scan, $karyawan);

                // Masuk -- ini nih
                $start = strtotime('05:00:00');
                $end = strtotime('10:30:00');
                if ($scanTime >= $start && $scanTime < $end) {
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
                $start = strtotime('12:45:00');
                $end = strtotime('14:30:00');
                if ($scanTime >= $start && $scanTime < $end) {
                    $karyawan->kehadiran()->updateOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'jam_kembali' => date('H:i:s', strtotime($scan->ScanDate))
                    ]);

                    continue;
                }

                // Pulang
                $start = strtotime('14:30:00');
                $end = strtotime('18:00:00');
                if ($scanTime >= $start && $scanTime < $end) {
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

                // device apel
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
