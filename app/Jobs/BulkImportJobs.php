<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Jabatan;
use App\Models\Bidang;
use App\Models\Karyawan;
use App\Models\Unit;

class BulkImportJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // public $afterCommit = true;
    protected $karyawan;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Karyawan $karyawan, $data)
    {
        $this->karyawan = $karyawan;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $jabatan = Jabatan::pluck('id', 'nama_jabatan')->toArray();
        $bidang = Bidang::pluck('id', 'nama_bidang')->toArray();
        $unit = Unit::pluck('id', 'nama_unit')->toArray();
        // $this->karyawan->jabatan()->sync($this->ids($this->data['jabatan'], $jabatan));
        $this->karyawan->bidang()->sync($this->ids($this->data['bidang'], $bidang));
        $this->karyawan->unit()->sync($this->ids($this->data['unit'], $unit));
    }

    public function ids($data, $pluck)
    {
        $ids = [];
        $exp = explode('/', $data);
        foreach ($exp as $e) {
            if (isset($pluck[trim($e)])) {
                array_push($ids, $pluck[trim($e)]);
            }
        }

        return $ids;
    }
}
