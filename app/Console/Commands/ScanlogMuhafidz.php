<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ScanlogJob;
use App\Libraries\EasyLink;
use App\Models\Karyawan;
use App\Models\Device;
use App\Models\ApelDay;

class ScanlogMuhafidz extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scanlog:muhafidz';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scanlog pengambilan data FingerPrint Kehadiran Muhafidz';

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
        $jam = [
            'datang_subuh_min' => strtotime('05:00:00'),
            'datang_subuh_max' => strtotime('05:30:00'),
            'pulang_subuh_min' => strtotime('06:00:00'),
            'pulang_subuh_max' => strtotime('06:29:00'),
            'datang_malam_min' => strtotime('18:00:00'),
            'datang_malam_max' => strtotime('18:45:00'),
            'pulang_malam_min' => strtotime('19:30:00'),
            'pulang_malam_max' => strtotime('20:00:00'),
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
                if (!$karyawan) {
                    continue;
                }

                // Simpan Log
                ScanlogJob::dispatch($scan, $karyawan);

                // Masuk pagi -- ini nih
                if ($scanTime >= $jam['pagi_min'] && $scanTime < $jam['pagi_max']) {
                    // if ($scan->PIN == "220289") {
                    //     goto apel;
                    // }

                    $karyawan->kehadiran()->firstOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate))
                    ]);
                }

                // Pulang pagi -- ini nih
                if ($scanTime >= $jam['pulangPagi_min'] && $scanTime < $jam['pulangPagi_max']) {
                    $karyawan->kehadiran()->firstOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'jam_istirahat' => date('H:i:s', strtotime($scan->ScanDate))
                    ]);
                }



                // Kembali
                if ($scanTime >= $jam['malam_min'] && $scanTime < $jam['malam_max']) {

                    $karyawan->kehadiran()->updateOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'jam_kembali' => date('H:i:s', strtotime($scan->ScanDate)),
                    ]);

                    continue;
                }

                // Pulang
                if ($scanTime >= $jam['pulangMalam_min'] && $scanTime < $jam['pulangMalam_max']) {
                    $karyawan->kehadiran()->updateOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'jam_pulang' => $scanTime
                    ]);

                    continue;
                }

            }
        }
    }
}
