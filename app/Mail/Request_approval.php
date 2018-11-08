<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Ticket;

class Request_approval extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $ticket;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Request')
                    ->markdown('Mail.request_approval')
                    ->with([
                        'position'=>$this->ticket->position_name,
                    ]);
    }
}
