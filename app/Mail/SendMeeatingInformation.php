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
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Interview,$Student,$academic_program,$Room,$archive_id)
    {
     
        $this->Interview= $Interview;
        $this->Student=$Student;
        $this->Room=$Room;
        $this->academic_program=$academic_program;
        $this->archive_id= $archive_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rtic.ambiental@uaslp.mx', 'DETALLES DE ENTREVISTA')->markdown('Correos.MeetingPostulante')->subject('Información de entrevista');
    }
}
