<?php

namespace App\Listeners;

use App\Event\ReportSender;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SendReport;

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
        dd("I got here");
        Mail::to('adekunle.s@dreamworksdirect.com')->send( new SendReportNotification($event->scoop));
    }
}
