<?php

namespace App\Listeners;

use Mail;

use App\Event\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\CreateUsers;

class SendEmail
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
     * @param  \App\Event\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        //dd($event);
        Mail::to($event->user->email)->send( new CreateUsers($event->user));
    }
}
