<?php

namespace App\Providers;

use App\Providers\RegisteredUsers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  \App\Providers\RegisteredUsers  $event
     * @return void
     */
    public function handle(RegisteredUsers $event)
    {
        //
    }
}
