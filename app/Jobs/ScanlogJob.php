<?php

namespace App\Jobs;

use App\Models\Device;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ScanlogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $scanlog;
    public $karyawan;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($scanlog, $karyawan)
    {
        $this->scanlog = $scanlog;
        $this->karyawan = $karyawan;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // dd($this->scanlog, $this->karyawan);
        $device = Device::where('serial_number', $this->scanlog->SN)->first();
        $device->deviceLogs()->create([
            'nama_lengkap' => $this->karyawan->nama_lengkap,
            'detail' => json_encode($this->scanlog),
            'scan_at' => date('Y-m-d H:i:s', strtotime($this->scanlog->ScanDate))
        ]);
    }
}
