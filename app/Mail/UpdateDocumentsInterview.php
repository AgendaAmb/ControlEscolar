<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateDocumentsInterview extends Mailable
{
    use Queueable, SerializesModels;


    public $Student;
    public $academic_program;
    public $archive_id;
    public $mail_academic_program;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Student,$academic_program,$archive_id)
    {
        $this->Student=$Student;
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
        $correo = 'rtic.ambiental@uaslp.mx';

        if($this->academic_program['alias'] === 'imarec'){
            $correo = 'imarec.escolar@uaslp.mx';
        }else{
            $correo = 'pmpca@uaslp.mx';
        }
        return $this->from($correo, 'DOCUMENTOS ENTREVISTA')->markdown('Correos.UpdateDocumentsInterview')->subject('Envia los documentos de la entrevista');
    }
}
