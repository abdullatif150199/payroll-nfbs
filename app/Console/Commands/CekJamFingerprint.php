<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;
use App\Libraries\EasyLink;
use App\Models\Device;

class CekJamFingerprint extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cek:jam';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scanlog pengecekan koneksi dan settingan jam pada fingerprint';

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
        $devices = Device::select('serial_number', 'keterangan')->get();
        $info = '';

        foreach ($devices as $device) {
            $conn = $finger->info($device->serial_number);

            if ($conn && $conn->Result) {

                $timer = str_replace("/", "-", $conn->DEVINFO->Jam);
                if (strtotime($timer) <= strtotime('-2 minutes') || strtotime($timer) >= strtotime('+2 minutes')) {
                    $info = $info . $device->keterangan . ' : ' . $timer . PHP_EOL;
                    echo "jam salah";
                }
            } else {
                $info = $info . $device->keterangan . ' : jaringan putus' . PHP_EOL;
            }
        }

        Log::critical("Koneksi", ['info' => $info]);
    }
}
