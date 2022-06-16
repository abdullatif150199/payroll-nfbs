<?php

use Illuminate\Console\Command;
use App\Models\Rekening;

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
        $rekening = Rekening::find(1);
        dd($rekening->total_amount);
    }
}
