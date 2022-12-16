<?php

namespace App\Console\Commands;

use App\Jobs\ScanlogJob;
use App\Libraries\EasyLink;
use App\Models\Device;
use App\Models\Karyawan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

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

        $jam = [
            'masuk_min' => strtotime('05:00:00'),
            'masuk_max' => strtotime('10:30:00'),
            'kembali_min' => strtotime('12:45:00'),
            'kembali_max' => strtotime('14:30:00'),
            'pulang_min' => strtotime('14:30:00'),
            'pulang_max' => strtotime('18:00:00'),
        ];

        $finger = new EasyLink;
        $device = Device::where('tipe', '2')
            ->where('keterangan', 'POS SATPAM A')->first();

        $serial = $device->serial_number;
        $scanlogs = $finger->newScan($serial);

        if ($scanlogs == null || !$scanlogs->Result) return;

        foreach ($scanlogs->Data as $scan) {
            $scanTime = strtotime(date('H:i:s', strtotime($scan->ScanDate)));

            /* -- start khusus pegawai non-shift misal pak Iip -- */
            if ($scan->PIN == "302015") {
                $karyawan = Karyawan::where('no_induk', $scan->PIN)->first();

                if (!$karyawan) continue;

                // Simpan Log
                ScanlogJob::dispatch($scan, $karyawan);

                // Masuk -- ini nih
                if ($scanTime >= $jam['masuk_min'] && $scanTime < $jam['masuk_max']) {

                    $karyawan->kehadiran()->firstOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate))
                    ]);

                    continue;
                }

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
            }

            /* -- end khusus pegawai non-shift misal pak Iip -- */


            /* -- start get karyawan id dengan tipe_kerja shift -- */
            $satpam = Karyawan::where('tipe_kerja', 'shift')
                ->where('no_induk', $scan->PIN)->first();
            /* -- end get karyawan id dengan tipe_kerja shift -- */

            if (!$satpam) continue;
            ScanlogJob::dispatch($scan, $satpam);

            Log::critical("Data Satpam", ["nama" => $satpam->nama_lengkap, "waktu" => date('H:i:s', strtotime($scan->ScanDate))]);

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
                                'tipe' => 'shift',
                            ]);
                        } else {
                            $satpam->kehadiran()->updateOrCreate([
                                'tanggal' => date('Y-m-d', strtotime($scan->ScanDate . "-1 day"))
                            ], [
                                'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate)),
                                'tipe' => 'shift',
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
                            'tipe' => 'shift',
                        ]);
                    } else {

                        if (strtotime($result->jam_masuk) < strtotime($shifts['_2_min'])) {
                            $satpam->kehadiran()->updateOrCreate([
                                'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                            ], [
                                'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate)),
                                'tipe' => 'shift',
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
                            'tipe' => 'shift',
                        ]);
                    } else {

                        if (strtotime($result->jam_masuk) >= strtotime($shifts['_2_min']) && strtotime($result->jam_masuk) < strtotime($shifts['_3_min'])) {
                            $satpam->kehadiran()->updateOrCreate([
                                'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                            ], [
                                'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate)),
                                'tipe' => 'shift',
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
