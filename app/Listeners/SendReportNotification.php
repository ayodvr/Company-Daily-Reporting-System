<?php

namespace App\Listeners;

use App\Events\ReportSender;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendReportNotification
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
     * @param  \App\Events\ReportSender  $event
     * @return void
     */
    public function handle(ReportSender $event)
    {
        //
    }
}
