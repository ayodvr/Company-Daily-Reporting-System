<?php

namespace App\Listeners;

use Mail;

use App\Event\StudentCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SendCouponCode;

class SendCouponCodeNotification
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
     * @param  \App\Event\StudentCreated  $event
     * @return void
     */
    public function handle(StudentCreated $event)
    {
        dd($event);
        Mail::to($event->coupon['email_restrictions'])->send( new SendCouponCode($event->coupon));
    }
}
