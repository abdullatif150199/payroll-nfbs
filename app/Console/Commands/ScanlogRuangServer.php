<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

use App\Jobs\ScanlogJob;
use App\Libraries\EasyLink;
use App\Models\Karyawan;
use App\Models\Device;
use App\Models\ApelDay;

class ScanlogRuangServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scanlog:ruangserver';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $finger = new EasyLink;
        $scanlogs = $finger->newScan("61627018330776");

        // dd($scanlogs);

        if (!$scanlogs->Result) {
            Log::critical('putus: ', ['sn'=>'aku']);
            return 0;
        }
        // dd($scanlogs->Data);
        foreach ($scanlogs->Data as $scan) {
            $scanTime = strtotime(date('H:i:s', strtotime($scan->ScanDate)));
            // dd($scanTime);
            $karyawan = Karyawan::where('no_induk', $scan->PIN)->first();
            if (!$karyawan) {
                continue;
            }

            // Simpan Log
            ScanlogJob::dispatch($scan, $karyawan);

            // Masuk -- ini nih
            $start = strtotime('05:00:00');
            $end = strtotime('10:10:00');
            if ($scanTime >= $start && $scanTime < $end) {
                $karyawan->kehadiran()->firstOrCreate([
                    'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                ], [
                    'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate))
                ]);
            }
            // dd($scanTime);
            // Istirahat
            $start = strtotime('08:10:00');
            $end = strtotime('08:20:00');
            if ($scanTime >= $start && $scanTime < $end) {
                $karyawan->kehadiran()->updateOrCreate([
                    'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                ], [
                    'jam_istirahat' => date('H:i:s', strtotime($scan->ScanDate))
                ]);

                continue;
            }

            // Kembali
            $start = strtotime('08:20:00');
            $end = strtotime('08:25:00');
            if ($scanTime >= $start && $scanTime < $end) {
                $karyawan->kehadiran()->updateOrCreate([
                    'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                ], [
                    'jam_kembali' => date('H:i:s', strtotime($scan->ScanDate))
                ]);

                continue;
            }

            // Pulang
            $start = strtotime('08:25:00');
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
            // $apelDay = ApelDay::where('day_name', date('l'))->first();
            // if ($device->tipe == '3' && $apelDay) {
            //     $start = strtotime($apelDay->start_time_at . '- 30 minutes');
            //     $end = strtotime($apelDay->end_time_at);
            //     // apakah hadir dijam apel
            //     if ($scanTime >= $start && $scanTime <= $end) {
            //         $karyawan->attendanceApel()->updateOrCreate([
            //             'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
            //         ], [
            //             'hari' => date('l'),
            //             'masuk' => date('H:i:s', strtotime($scan->ScanDate))
            //         ]);
            //     }
            // }
        }



    }
}
