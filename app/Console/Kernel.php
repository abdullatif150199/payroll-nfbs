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
        Commands\ScanlogNonShift::class,
        Commands\ScanlogShift::class,
        Commands\CheckExpiredPotongan::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('scanlog:nonshift')
                ->withoutOverlapping()
                ->everyFifteenMinutes();
        // $schedule->command('scanlog:shift')
        //         ->withoutOverlapping()
        //         ->everyFifteenMinutes();

        $schedule->command('potongan:expired')
                ->withoutOverlapping()
                ->daily();
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
