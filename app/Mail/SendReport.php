<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Retail;

class SendReport extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($scoop)
    {
        dd("I got here");
        $this->scoop = $scoop;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->markdown('emails.sendReport')->subject('You registration is successful');
                                                        // ->attach('/path/to/file', [
                                                        //     'as' => 'name.pdf',
                                                        //     'mime' => 'application/pdf',
                                                        // ]);
    }

}
