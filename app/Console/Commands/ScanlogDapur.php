<?php

namespace App\Console\Commands;

use App\Jobs\ScanlogJob;
use App\Libraries\EasyLink;
use App\Models\Device;
use App\Models\Karyawan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ScanlogDapur extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scanlog:dapur';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scanlog pengambilan data FingerPrint Shift Dapur';

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
            '_1_min'        => '01:00',
            '_2_min'        => '06:30',
            '_3_min_break'  => '11:00',
            '_4_min'        => '13:00',
            '_5_min'        => '16:00',
            '_1_max'        => '02:00',
            '_2_max'        => '07:30',
            '_3_max_break'  => '12:00',
            '_4_max'        => '14:00',
            '_5_max'        => '17:00',
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
            ->where('keterangan', 'DAPUR')->first();

        $dapur_shift = Karyawan::whereRelation('unit', 'id', 50)
            ->where('tipe_kerja', 'shift')
            ->pluck('no_induk')
            ->toArray();

        $serial = $device->serial_number;
        $scanlogs = $finger->newScan($serial);

        if ($scanlogs == null || !$scanlogs->Result) return;

        foreach ($scanlogs->Data as $scan) {
            $scanTime = strtotime(date('H:i:s', strtotime($scan->ScanDate)));

            /* -- start khusus pegawai non-shift misal pak Iip -- */
            if (!in_array($scan->PIN, $dapur_shift)) {
                $karyawan = Karyawan::where('no_induk', $scan->PIN)->first();

                if (!$karyawan) continue;

                // Simpan Log
                ScanlogJob::dispatch($scan, $karyawan);

                // Masuk -- ini nih
                if ($scanTime >= $jam['masuk_min'] && $scanTime < $jam['masuk_max']) {

                    $karyawan->kehadiran()->firstOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate)),
                        'jam_istirahat' => '11:30:00'
                    ]);

                    continue;
                }

                if ($scanTime >= $jam['kembali_min'] && $scanTime < $jam['kembali_max']) {

                    $karyawan->kehadiran()->updateOrCreate([
                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                    ], [
                        'jam_kembali' => date('H:i:s', strtotime($scan->ScanDate)),
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
            } else {
                /* -- start get karyawan id dengan tipe_kerja shift -- */
                $dapur = Karyawan::where('tipe_kerja', 'shift')
                    ->where('no_induk', $scan->PIN)->first();
                /* -- end get karyawan id dengan tipe_kerja shift -- */

                if (!$dapur) continue;
                ScanlogJob::dispatch($scan, $dapur);

                Log::critical("Data Dapur", ["nama" => $dapur->nama_lengkap, "waktu" => date('H:i:s', strtotime($scan->ScanDate))]);

                switch (true) {
                    case ($scanTime >= strtotime($shifts['_1_min']) && $scanTime < strtotime($shifts['_1_max'])):
                        $result = $dapur->kehadiran()
                            ->where('tanggal', date('Y-m-d', strtotime($scan->ScanDate)))
                            ->first();

                        if ($result == null) {
                            $dapur->kehadiran()->firstOrCreate([
                                'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                            ], [
                                'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate)),
                                'jam_istirahat' => '04:30:00',
                            ]);
                        }

                        break;

                    case ($scanTime >= strtotime($shifts['_2_min']) && $scanTime < strtotime($shifts['_2_max'])):
                        /* -- cek apakah jam kedatangan sudah ada */
                        $result = $dapur->kehadiran()
                            ->where('tanggal', date('Y-m-d', strtotime($scan->ScanDate)))
                            ->first();
                        // dd($result);
                        if ($result == null) {
                            $dapur->kehadiran()->firstOrCreate([
                                'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                            ], [
                                'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate)),
                                'jam_istirahat' => NULL,
                            ]);
                        } else {
                            if (strtotime($result->jam_masuk) < strtotime($shifts['_2_min'])) {
                                $dapur->kehadiran()->updateOrCreate([
                                    'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                                ], [
                                    'jam_kembali' => '04:30:00',
                                    'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate)),
                                ]);
                            }
                        }

                        break;

                    case ($scanTime >= strtotime($shifts['_3_min_break']) && $scanTime < strtotime($shifts['_3_max_break'])):
                        $dapur->kehadiran()->updateOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_istirahat' => date('H:i:s', strtotime($scan->ScanDate))
                        ]);

                        break;

                    case ($scanTime >= strtotime($shifts['_4_min']) && $scanTime < strtotime($shifts['_4_max'])):
                        $dapur->kehadiran()->updateOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_kembali' => date('H:i:s', strtotime($scan->ScanDate))
                        ]);

                        break;

                    case ($scanTime >= strtotime($shifts['_5_min']) && $scanTime < strtotime($shifts['_5_max'])):
                        $dapur->kehadiran()->updateOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate))
                        ]);

                        break;
                }
            }
        }
    }
}
