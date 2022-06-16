<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendUpdateDocuments extends Mailable
{
    use Queueable, SerializesModels;
        
    // recieved in this order
    public $personal_documents;
    public $entrance_documents;
    public $academic_documents;
    public $language_documents;
    public $working_documents;
    public $name_documents;

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
     
    public function __construct(
        $personal_documents, 
        $entrance_documents, 
        $academic_documents, 
        $language_documents, 
        $working_documents,
        $name_documents,
        $instructions, 
        $appliant, 
        $academic_program, 
        $archive_id, 
        $url_LogoAA, 
        $url_ContactoAA
        ){
        $this->personal_documents = $personal_documents;
        $this->entrance_documents = $entrance_documents;
        $this->academic_documents = $academic_documents;
        $this->language_documents = $language_documents;
        $this->working_documents = $working_documents;
        $this->name_documents = $name_documents;
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
        return $this->from('rtic.ambiental@uaslp.mx', 'Actualiza tu documentación')->markdown('Correos.ShowUpdateDocuments')->subject('Resultados de proceso de revisión');

        // return $this->markdown('Correos.ShowUpdateDocuments');
        // return $this->view('Correos.ShowUpdateDocuments');
    }
}
