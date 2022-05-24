<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendUpdateDocuments extends Mailable
{
    use Queueable, SerializesModels;

    public $required_documents;
    public $instructions;
    public $appliant;
    public $academic_program;
    public $archive_id;
    public $url_LogoAA;
    public $url_ContactoAA;

    /**
     * Create a new message instance.
     * 
     * Recibe los documentos requeridos a cambiar $required?documents
     * La información del aplicante $appliant
     * El id del archivo
     * Informacion del programa academico
     *
     * @return void
     */
     
    public function __construct($required_documents, $instructions, $appliant, $academic_program, $archive_id, $url_LogoAA, $url_ContactoAA)
    {
        $this->required_documents = $required_documents;
        $this->instructions = $instructions;
        $this->appliant = $appliant;
        $this->academic_program = $academic_program;
        $this->archive_id = $archive_id;
        $this->url_LogoAA = $url_LogoAA;
        $this->url_ContactoAA = $url_ContactoAA;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Correos.ShowUpdateDocuments');
        // return $this->view('Correos.ShowUpdateDocuments');
    }
}
