<?php

namespace App\Listeners;

use App\Events\DapatkanGaji;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProsesGaji
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DapatkanGaji  $event
     * @return void
     */
    public function handle(DapatkanGaji $event)
    {
        //
    }
}
