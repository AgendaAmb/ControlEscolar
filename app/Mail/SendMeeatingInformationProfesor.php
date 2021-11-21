<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMeeatingInformationProfesor extends Mailable
{
    use Queueable, SerializesModels;

    
    public $Meeating;
    public $Student;
    public $Profesor;
    public $Room;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Meeating,$Profesor,$Room,$Student)
    {
     
        $this->Meeating=$Meeating;
        $this->Profesor=$Profesor;
        $this->Room=$Room;
        $this->Student=$Student;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Correos.MeetingZoomProfesor')->subject('Información de entrevista');
    }
}
