<?php

namespace App\Console\Commands;

use App\Jobs\ScanlogJob;
use App\Libraries\EasyLink;
use App\Models\Device;
use App\Models\Karyawan;
use Illuminate\Console\Command;

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
    }
}
