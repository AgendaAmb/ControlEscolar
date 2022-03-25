<?php

namespace App\Mail;

use App\Models\AcademicProgram;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendRecommendationLetter extends Mailable
{
    use Queueable, SerializesModels;

    // public $id_archive;
    // public $id_recommendation_letter;
    public $academic_program;
    public $appliant;
    public $email;
    public $my_token;
    public $url_LogoAA;
    public $url_ContactoAA;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $email,  $appliant,  $academic_program, $my_token, $url_LogoAA, $url_ContactoAA )
    {
        $this->appliant = $appliant;
        $this->email = $email;
        $this->academic_program = $academic_program;
        $this->my_token = $my_token;
        $this->url_ContactoAA = $url_ContactoAA;
        $this->url_LogoAA = $url_LogoAA;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Correos.recommendation-letter.ShowRecommendationLetter');
    }
}
