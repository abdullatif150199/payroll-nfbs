<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Jabatan;
use App\Models\Bidang;

class BulkImportJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $karyawan;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $karyawan)
    {
        $this->data = $data;
        $this->karyawan = $karyawan;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $jabatan = Jabatan::pluck('id', 'nama_jabatan')->toArray();
        $bidang = Bidang::pluck('id', 'nama_bidang')->toArray();
        $this->karyawan->jabatan()->sync($this->ids($this->data, $jabatan));
        $this->karyawan->bidang()->sync($this->ids($this->data, $bidang));
    }

    public function ids($data, $pluck)
    {
        $ids = [];
        $exp = explode('/', $data);

        foreach ($exp as $e) {
            array_push($ids, $pluck[trim($e)]);
        }

        return $ids;
    }
}
