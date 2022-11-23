<?php

namespace App\Listeners;

use Mail;

use App\Event\ReportSender;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SendReport;

class SendLoginNotification
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
        //dd($event);
        Mail::to($event->data3['email'])->send( new SendReport($event->data3));
    }
}
