<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendZoomMeeatingInformationProfesor extends Mailable
{
    use Queueable, SerializesModels;

    
    public $Meeating;
    public $Student;
    public $Profesor;
    public $Room;
    public $academic_program;
    public $url_ContactoAA;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Meeating, $Profesor, $academic_program, $Room,$Student,$url_ContactoAA)
    {
        $this->Meeating=$Meeating;
        $this->Profesor=$Profesor;
        $this->Room=$Room;
        $this->Student=$Student;
        $this->academic_program=$academic_program;
        $this->url_ContactoAA=$url_ContactoAA;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $correo = 'rtic.ambiental@uaslp.mx';

        if($this->academic_program['alias'] === 'imarec'){
            $correo = 'imarec.escolar@uaslp.mx';
        }else{
            $correo = 'pmpca@uaslp.mx';
        }

        return $this->from($correo, 'DETALLES DE ENTREVISTA')->view('Correos.MeetingZoomProfesor')->subject('Información de entrevista');
    }
}
