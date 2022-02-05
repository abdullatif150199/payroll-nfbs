<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libraries\EasyLink;
use App\Models\Karyawan;
use App\Models\Device;

class ScanlogShift extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scanlog:shift';

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
        $devices = Device::where('tipe', '1')->get();
        $ioMode = ['1' => 'shift 1 masuk', '2' => 'shift 1 pulang', '3' => 'shift 2 masuk', '4' => 'shift 2 pulang'];

        foreach ($devices as $device) {
            $serial = $device->serial_number;
            $port = $device->server_port;
            $ip = $device->server_ip;
            $scanlogs = $finger->newScan($serial, $port, $ip);

            // kalo True
            if ($scanlogs->Result) {
                foreach ($scanlogs->Data as $scan) {
                    $karyawan = Karyawan::where('no_induk', $scan->PIN)->first();

                    // Masuk shift 1
                    if ($scan->IOMode === 1) {
                        $karyawan->kehadiran()->updateOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate))
                        ]);
                    }

                    // Pulang shift 1
                    if ($scan->IOMode === 2) {
                        $karyawan->kehadiran()->updateOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate))
                        ]);
                    }

                    // Masuk shift 2
                    if ($scan->IOMode === 3) {
                        $karyawan->kehadiran()->updateOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate))
                        ]);
                    }

                    // Pulang shift 2
                    if ($scan->IOMode === 4) {
                        $karyawan->kehadiran()->updateOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate))
                        ]);
                    }

                    // Masuk shift 3
                    if ($scan->IOMode === 5) {
                        $karyawan->kehadiran()->updateOrCreate([
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ], [
                            'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate))
                        ]);
                    }

                    // Pulang shift 3
                    if ($scan->IOMode === 6) {
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
