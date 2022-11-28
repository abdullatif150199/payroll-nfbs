<?php

namespace App\Console\Commands;

use App\Jobs\ScanlogJob;
use App\Libraries\EasyLink;
use App\Models\Device;
use App\Models\Karyawan;
use Illuminate\Console\Command;

class ScanlogSatpam extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scanlog:satpam';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scanlog pengambilan data FingerPrint Shift Satpam';

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
        $shifts = [
            '_1_min' => '06:30',
            '_2_min' => '14:30',
            '_3_min' => '22:30',
            '_1_max' => '07:30',
            '_2_max' => '15:30',
            '_3_max' => '23:30',
        ];

        $finger = new EasyLink;
        $device = Device::where('tipe', '2')
            ->where('keterangan', 'POS SATPAM A')->first();

        $serial = $device->serial_number;
        $scanlogs = $finger->newScan($serial);

        if ($scanlogs == null || !$scanlogs->Result) return;

        foreach ($scanlogs->Data as $scan) {
            $scanTime = strtotime(date('H:i:s', strtotime($scan->ScanDate)));

            /* -- start get karyawan id dengan tipe_kerja shift -- */
            $satpam = Karyawan::where('tipe_kerja', 'shift')
                ->where('no_induk', $scan->PIN)->first();
            /* -- end get karyawan id dengan tipe_kerja shift -- */

            if (!$satpam) continue;
            ScanlogJob::dispatch($scan, $satpam);

            switch (true) {
                case ($scanTime >= strtotime($shifts['_1_min']) && $scanTime < strtotime($shifts['_1_max'])):
                    $result = $satpam->kehadiran()
                        ->where('tanggal', date('Y-m-d', strtotime($scan->ScanDate)))
                        ->first();

                    if ($result == null) {
                        $yesterday = $satpam->kehadiran()
                            ->where('tanggal', date('Y-m-d', strtotime($scan->ScanDate . "-1 day")))
                            ->whereTime('jam_masuk', '>=', $shifts['_3_min'])
                            ->first();

                        if ($yesterday == null) {
                            $satpam->kehadiran()->firstOrCreate([
                                'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                            ], [
                                'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate)),
                            ]);
                        } else {
                            $satpam->kehadiran()->updateOrCreate([
                                'tanggal' => date('Y-m-d', strtotime($scan->ScanDate . "-1 day"))
                            ], [
                                'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate)),
                            ]);
                        }
                    } else {
                        echo 'jam_masuk sudah terisi';
                    }

                    break;

                case ($scanTime >= strtotime($shifts['_2_min']) && $scanTime < strtotime($shifts['_2_max'])):
                    /* -- cek apakah jam kedatangan sudah ada */
                    $result = $satpam->kehadiran()
                        ->where('tanggal', date('Y-m-d', strtotime($scan->ScanDate)))
                        ->first();
                    // dd($result);
                    if ($result == null) {
                        $satpam->kehadiran()->firstOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate)),
                        ]);
                    } else {

                        if (strtotime($result->jam_masuk) < strtotime($shifts['_2_min'])) {
                            $satpam->kehadiran()->updateOrCreate([
                                'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                            ], [
                                'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate)),
                            ]);
                        } else {
                            echo "lebih kecil dari batas minimal shift";
                        }
                    }

                    break;

                case ($scanTime >= strtotime($shifts['_3_min']) && $scanTime < strtotime($shifts['_3_max'])):

                    $result = $satpam->kehadiran()
                        ->where('tanggal', date('Y-m-d', strtotime($scan->ScanDate)))
                        ->first();

                    if ($result == null) {
                        $satpam->kehadiran()->firstOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate)),
                        ]);
                    } else {

                        if (strtotime($result->jam_masuk) >= strtotime($shifts['_2_min']) && strtotime($result->jam_masuk) < strtotime($shifts['_3_min'])) {
                            $satpam->kehadiran()->updateOrCreate([
                                'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                            ], [
                                'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate)),
                            ]);
                        } else {
                            echo "lebih kecil dari batas minimal shift";
                        }
                    }

                    break;
            }
        }

        // return 0;
    }
}
