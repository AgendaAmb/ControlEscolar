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
    public $Student;
    public $Room;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Meeating,$Student,$Room)
    {
     
        $this->Meeating=$Meeating;
        $this->Student=$Student;
        $this->Room=$Room;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pmpca@uaslp.mx', 'TESTING')->view('Correos.MeetingZoomPostulante')->subject('Información de entrevista');
    }
}
