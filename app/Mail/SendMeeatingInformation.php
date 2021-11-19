<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMeeatingInformation extends Mailable
{
    use Queueable, SerializesModels;

   
    public $Meeating;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Meeating)
    {
     
        $this->Meeating=$Meeating;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Correos.MeetingZoom');
    }
}
