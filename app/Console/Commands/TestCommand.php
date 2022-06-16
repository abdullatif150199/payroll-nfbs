<?php

namespace App\Console\Commands;

use App\Jobs\ScanlogJob;
use Illuminate\Console\Command;
use App\Libraries\EasyLink;
use App\Models\Karyawan;
use App\Models\Device;
use App\Models\ApelDay;
use App\Models\Gaji;

class TestCommand extends Command
{
    public $bln = '2021-03';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testing:run';

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
        $gajiByMonth = Gaji::has('karyawan')->where('bulan', $this->bln)->cursor();
        $sumGaji = $gajiByMonth->groupBy('rekening_id');
        dd($sumGaji->toArray());
        $sumGaji = $gajiByMonth->groupBy('rekening_id')->map(function ($row) {
            dd($row);
            return $items;
        });
    }
}
