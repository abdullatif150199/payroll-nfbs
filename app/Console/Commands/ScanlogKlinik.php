<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libraries\EasyLink;
use App\Models\Karyawan;
use App\Models\Device;
use App\Jobs\ScanlogJob;

class ScanlogKlinik extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scanlog:klinik';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scanlog schedule for fingerprint klinik';

    protected $list = array('222351', '109148', '220289', '210121', '201009', '207056', '205039
    ');

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
        $devices = Device::where('tipe', '2')
            ->where('keterangan', 'klinik')->get();

        foreach ($devices as $device) {
            $serial = $device->serial_number;
            $scanlogs = $finger->newScan($serial);

            if (!$scanlogs->Result) {
                continue;
            }

            foreach ($scanlogs->Data as $scan) {
                $scanTime = strtotime(date('H:i:s', strtotime($scan->ScanDate)));
                $karyawan = Karyawan::where('no_induk', $scan->PIN)->first();

                if (!$karyawan) {
                    continue;
                }

                ScanlogJob::dispatch($scan, $karyawan);

                if ($scanTime >= strtotime('06:50:00') && $scanTime < strtotime('10:30:00')) {
                    $karyawan->kehadiran()->firstOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate))
                    ]);

                    continue;
                }

                if ($scanTime >= strtotime('12:00:00') && $scanTime < strtotime('17:30:00')) {
                    if (in_array($scan->PIN, $this->list)) {
                        $result = $karyawan->kehadiran()->where('tanggal', date('Y-m-d', strtotime($scan->ScanDate)))->first();
                        // dd($result, $scan->ScanDate);
                        if ($result == null || $result->jam_kembali == null) {
                            $karyawan->kehadiran()->updateOrCreate([
                                'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                            ], [
                                'jam_kembali' => date('H:i:s', strtotime($scan->ScanDate)),
                            ]);

                            continue;
                        }

                        $karyawan->kehadiran()->updateOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate)),
                        ]);

                        continue;
                    } else {
                        if ($scanTime >= strtotime('12:45:00') && $scanTime < strtotime('14:30:00')) {
                            $karyawan->kehadiran()->updateOrCreate([
                                'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                            ], [
                                'jam_kembali' => date('H:i:s', strtotime($scan->ScanDate)),
                                // 'jam_istirahat' => '12:00:00'
                            ]);

                            continue;
                        }

                        if ($scanTime >= strtotime('14:30:00') && $scanTime < strtotime('17:30:00')) {
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
                    }
                }
            }
        }
    }
}
