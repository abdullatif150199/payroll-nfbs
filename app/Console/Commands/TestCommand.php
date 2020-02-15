<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libraries\EasyLink;
use App\Models\Karyawan;
use App\Models\Device;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing Command';

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
        $devices = Device::all();

        foreach ($devices as $device) {
            $serial = $device->serial_number;
            $port = $device->server_port;
            $ip = $device->server_ip;
            $scanlogs = $finger->newScan($serial, $port, $ip);

            // kalo True
            if ($scanlogs->Result) {
                foreach ($scanlogs->Data as $scan) {
                    $karyawan = Karyawan::where('pin', $scan->PIN)->first();
                    $karyawan->kehadiranHariIni()->update([
                        'jam_pulang' => date('H:i:s', strtotime($scan->ScanDate))
                    ]);
                }
            }
        }

        $this->info('finish');
    }
}
