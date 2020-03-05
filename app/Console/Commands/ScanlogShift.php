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
    protected $description = 'Get data scanlog for shift';

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
        $devices = Device::where('tipe', '2')->get();

        foreach ($devices as $device) {
            $serial = $device->serial_number;
            $port = $device->server_port;
            $ip = $device->server_ip;
            $scanlogs = $finger->newScan($serial, $port, $ip);

            // kalo True
            if ($scanlogs->Result) {
                foreach ($scanlogs->Data as $scan) {
                    $karyawan = Karyawan::where('pin', $scan->PIN)->first();

                    if ($karyawan->tipe_kerja == 'shift') {

                        if (empty($karyawan->kehadiranHariIni)) {
                            if (!empty($kemarin = $karyawan->kehadiranKemarin)) {
                                // cek apakah kemarin jam pulang terisi
                                if (!empty($kemarin->jam_pulang)) {
                                    $a = $karyawan->kehadiran()->create([
                                        'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate)),
                                        'tanggal' => date('Y-m-d', strtotime($scan->ScanDate)),
                                        'tipe' => 'shift'
                                    ]);
                                    // dd($a);
                                } else {
                                    $kemarin->update([
                                        'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate))
                                    ]);
                                }

                            }
                        } else {
                            $karyawan->kehadiranHariIni()->update([
                                'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate))
                            ]);
                        }

                    } else {
                        $karyawan->kehadiran()->create([
                            'jam_masuk' => date('H:i:s', strtotime($scan->ScanDate)),
                            'tanggal' => date('Y-m-d', strtotime($scan->ScanDate))
                        ]);
                    }

                }
            }
        }
    }
}
