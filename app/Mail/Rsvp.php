<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Rsvp extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("You have new RSVP from {$this->data['guest_name']}!")
                ->markdown('emails.rsvp')
                ->with([
                    'guest_name' => $this->data['guest_name'],
                    'rsvp' => $this->data['rsvp'],
                    'number_of_attendance' => $this->data['number_of_attendance']
                ]);
    }
}
