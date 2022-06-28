<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMeeatingInformation extends Mailable
{
    use Queueable, SerializesModels;

   
    public $Interview;
    public $Student;
    public $Room;
    public $academic_program;
    public $archive_id;
    public $url_ContactoAA;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Interview,$Student,$academic_program,$Room,$archive_id,$url_ContactoAA)
    {
     
        $this->Interview= $Interview;
        $this->Student=$Student;
        $this->Room=$Room;
        $this->academic_program=$academic_program;
        $this->archive_id= $archive_id;
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
        return $this->from($correo, 'DETALLES DE ENTREVISTA')->markdown('Correos.MeetingPostulante')->subject('Información de entrevista');
    }
}
