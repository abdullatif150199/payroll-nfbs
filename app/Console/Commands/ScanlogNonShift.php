<?php

namespace App\Console\Commands;

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
        $ioMode = ['1' => 'masuk', '2' => 'istirahat', '3' => 'kembali', '4' => 'pulang'];

        $apelDays = ApelDay::pluck('day_name')->toArray();

        foreach ($devices as $device) {
            $serial = $device->serial_number;
            $port = $device->server_port;
            $ip = $device->server_ip;
            $scanlogs = $finger->newScan($serial, $port, $ip);

            // kalo True
            if ($scanlogs->Result) {
                foreach ($scanlogs->Data as $scan) {
                    $karyawan = Karyawan::where('no_induk', $scan->PIN)->first();

                    // Masuk
                    if ($scan->IOMode === 1) {
                        if ($device->tipe == '3') {
                            if (in_array(date('l'), $apelDays)) {
                                $karyawan->attendanceApel()->updateOrCreate([
                                    'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                                ], [
                                    'hari' => date('l'),
                                    'masuk' => date('H:i:s', strtotime($scan->ScanDate))
                                ]);
                            }
                        }

                        $karyawan->kehadiran()->firstOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate))
                        ]);
                    }

                    // Istirahat
                    if ($scan->IOMode === 2) {
                        $karyawan->kehadiran()->updateOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_istirahat' => date('H:i:s', strtotime($scan->ScanDate))
                        ]);
                    }

                    // Kembali
                    if ($scan->IOMode === 3) {
                        $karyawan->kehadiran()->updateOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_kembali' => date('H:i:s', strtotime($scan->ScanDate))
                        ]);
                    }

                    // Pulang
                    if ($scan->IOMode === 4) {
                        $karyawan->kehadiran()->updateOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate))
                        ]);
                    }
                }
            }
        }
    }
}
