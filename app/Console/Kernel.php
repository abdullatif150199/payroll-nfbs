<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\ScanlogMasuk::class,
        Commands\ScanlogIstirahat::class,
        Commands\ScanlogKembali::class,
        Commands\ScanlogPulang::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('scanlog:masuk')
                ->withoutOverlapping()
                ->between('05:30', '9:00');
        $schedule->command('scanlog:istirahat')
                ->withoutOverlapping()
                ->between('11:00', '12:45');
        $schedule->command('scanlog:kembali')
                ->withoutOverlapping()
                ->between('12:50', '14:30');
        $schedule->command('scanlog:pulang')
                ->withoutOverlapping()
                ->between('15:00', '17:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
