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
    public $academic_program;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Meeating,$Student,$academic_program,$Room)
    {
     
        $this->Meeating=$Meeating;
        $this->Student=$Student;
        $this->Room=$Room;
        $this->academic_program=$academic_program;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rtic.ambiental@uaslp.mx', 'TESTING - ALUMNO ')->view('Correos.MeetingZoomPostulante')->subject('Información de entrevista');
    }
}
