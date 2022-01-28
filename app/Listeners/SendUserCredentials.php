<?php

namespace App\Listeners;

use Mail;

use App\Events\RegisteredUsers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Mail\UserCreatedMail;

class SendUserCredentials
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
     * @param  \App\Events\RegisteredUsers  $event
     * @return void
     */
    public function handle(RegisteredUsers $event)
    {
        Mail::to($event->user->email)->send(new UserCreatedMail($event->user, $event->password));
    }
}
