<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Invitation_interview extends Mailable
{
    use Queueable, SerializesModels;

    public $interview;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($interview)
    {
        $this->interview = $interview;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->interview['from'],$this->interview['sender'])
                    ->subject($this->interview['subject'])
                    ->markdown('Mail.invitation_interview')
                    ->attach($this->interview['filename'], array('mime' => "text/calendar"))
                    ->with(['interview'=>$this->interview]);
    }
}
