<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRequiredDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('required_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('type', 25);
            $table->string('label', 120)->nullable();
            $table->string('example', 120)->nullable();
            $table->string('notes', 200)->nullable();
            $table->string('format_url', 150)->nullable();
            $table->boolean('intention_letter')->default(false);
            $table->boolean('recommendation_letter')->default(false);

            $table->index('name', 'required_document_name', 'btree');
            $table->softDeletes();
        });

        DB::table('required_documents')->insert([
            # Todos
            [
                'name' =>"1.- Acta de nacimiento",
                'type' => 'personal',
                'label' => "01_ActaNac_AñoDeSolicitud_iniciales(Apellidos,Nombres)",                
                'notes' => null,
                'example' => '01_ActaNac_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"2.- CURP expedido por la RENAPO",
                'type' => 'personal',
                'label' => '02_CURP_añodesolicitud_iniciales',
                'notes' => 'CURP Certificada y verificada por el registro civil.<br> Puedes generarlo, dando clic a <a href="https://www.gob.mx/curp/" target="_blank"> este vínculo </a>',
                'example' => '02_CURP_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"3.- INE en ampliación tamaño carta",
                'type' => 'personal',
                'label' => '03_INE_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '03_INE_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"4.- Primera página del pasaporte",
                'type' => 'personal',
                'label' => '04_Pasaporte_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '04_Pasaporte_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

            # Solo maestrías.
            [
                'name' =>"5A.- Título de licenciatura o acta de examen",
                'type' => 'academic',
                'label' => '05A_TitLicenciatula_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '05A_TitLicenciatula_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Solo IMAREC
            [
                'name' =>"5A.- Carta de pasantía",
                'type' => 'academic',
                'label' => '05A_CartaPasante_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '05A_CartaPasante_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Solo doctorado.
            [
                'name' =>"5B.- Título de maestría o acta de examen",
                'type' => 'academic',
                'label' => '05B_TítuloMat_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '05B_TítuloMat_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Solo maestrías.
            [
                'name' =>"6A.- Certificado de materias de la licenciatura",
                'type' => 'academic',
                'label' => '06A_CertLic_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '06A_CertfLic_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Solo doctorado.
            [
                'name' =>"6B.- Certificado de materias de la maestría",
                'type' => 'academic',
                'label' => '06B_CertMast_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '06B_CertfMast_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Solo maestrías.
            [
                'name' =>"7A.- Constancia de promedio de la licenciatura.",
                'type' => 'academic',
                'label' => '07A_PromedioLic_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '07A_PromedioLic_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

            # Solo doctorado.
            [
                'name' =>"7B.- Constancia de promedio de la maestría.",
                'type' => 'academic',
                'label' => '07B_PromedioMae_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '07B_PromedioMae_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Solo maestrías.
            [
                'name' =>"8A.- Cédula de la licenciatura",
                'type' => 'academic',
                'label' => '08A_Cédula_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '08A_Cédula_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],


            # Solo doctorado.
            [
                'name' =>"8B.- Cédula de la maestría",
                'type' => 'academic',
                'label' => '08B_Cédula_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '08B_Cédula_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"12.- Resultados del EXANI III vigente (no aplica a estudiantes extranjeros)",
                'type' => 'entrance',
                'label' => '12_EXANIIII_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '12_EXANIIII_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"18.- Carta compromiso y de manifestación de lineamientos (firmada y escaneada)",
                'type' => 'entrance',
                'label' => '18_EXANIIII_añodesolicitud_iniciales',                
                'notes' => 'Favor de descargar, <a href="#"> dando clic aquí</a>',
                'example' => '18_CartaCompromiso_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"13.- Certificado de idioma vigente",
                'type' => 'language',
                'label' => '13_Idioma_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '13_Idioma_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            /*
            [
                'name' =>"13B.-Certificado de idioma español.",
                'type' => 'language',
                'label' => '13B_Español_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '13B_Español_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],*/
            
            # Todos
            [
                'name' =>"11.- Carta de intención de un profesor del núcleo básico (el profesor la envía directamente)",
                'type' => 'entrance',
                'label' => '14_Intencion_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '14_Intencion_2021_CJG',
                'intention_letter' => true,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"19.- Propuesta de proyecto avalada por el profesor postulante",
                'type' => 'entrance',
                'label' => '19_Proyecto_iniciales',                
                'notes' => null,
                'example' => '19_Proyecto_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"18A.- Carta de recomendación",
                'type' => 'curricular',
                'label' => '18A_Recomendación_01_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '18A_Recomendación_01_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => true,
            ],
            
            # Todos
            [
                'name' =>"18B.- Carta de recomendación.",
                'type' => 'curricular',
                'label' => '18B_Recomendación_02_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '18B_Recomendación_02_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => true,
            ],
/*
            [
                'name' =>"1.- Birth Certificate",
                'type' => 'personal',
                'label' => "01_BirthCert_iniciales",                
                'notes' => null,
                'example' => '01_BirthCert_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"2.- CURP",
                'type' => 'personal',
                'label' => '02_CURP_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '02_CURP_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"3.- INE",
                'type' => 'personal',
                'label' => '03_INE_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '03_INE_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"4.- Passport",
                'type' => 'personal',
                'label' => '04_Pasaporte_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '04_Pasaporte_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"5.- High School Certificate",
                'type' => 'academic',
                'label' => '05_HighSchool_iniciales',                
                'notes' => null,
                'example' => '05_HighSchool_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"5A.- Bachelor Degree",
                'type' => 'academic',
                'label' => '05A_DegreeBachelor_iniciales',                
                'notes' => null,
                'example' => '05A_DegreeBachelor_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"6.- Bachelor Transcript",
                'type' => 'academic',
                'label' => '06A_TranscriptBachelor_iniciales',                
                'notes' => null,
                'example' => '06A_TranscriptBachelor_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"7.- Final Grade Average of Bachelor Degree",
                'type' => 'academic',
                'label' => '07A_PromBachelor_iniciales',                
                'notes' => null,
                'example' => '07A_PromBachelor_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"8.- Professional License",
                'type' => 'academic',
                'label' => '08A_ProfessionalLicense_iniciales',                
                'notes' => null,
                'example' => '08A_ProfessionalLicense_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"9.- ENREM Application Form",
                'type' => 'entrance',
                'label' => '09A_Application_iniciales',                
                'notes' => null,
                'example' => '09A_Application_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"9A.- DAAD Application Form",
                'type' => 'entrance',
                'label' => '09A_DAAD_iniciales',                
                'notes' => null,
                'example' => '09A_DAAD_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"13A.- Proof of English Proficiency",
                'type' => 'entrance',
                'label' => '13A_English_iniciales',                
                'notes' => null,
                'example' => '13A_English_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"13B.- Proof of Spanish Proficiency",
                'type' => 'entrance',
                'label' => '13B_Spanish_iniciales',                
                'notes' => null,
                'example' => '13B_English_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"13C.- Proof of German Proficiency",
                'type' => 'entrance',
                'label' => '13C_German_iniciales',                
                'notes' => null,
                'example' => '13C_German_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"15.- Project idea",
                'type' => 'entrance',
                'label' => '15_ProjectIdea_iniciales',                
                'notes' => null,
                'example' => '15_ProjectIdea_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"16.- Currículum Vítae",
                'type' => 'curricular',
                'label' => '16_CV_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '16_CV_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"17A.- Certificate(s) of Employment/Internship",
                'type' => 'curricular',
                'label' => '17A_ProofExperience_iniciales',                
                'notes' => null,
                'example' => '17A_ProofExperience_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"17B.- Confirmation of employment",
                'type' => 'curricular',
                'label' => '17B_ConfirmationEmp_iniciales',                
                'notes' => null,
                'example' => '17B_ConfirmationEmp_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"18A.- Recommendation Letter",
                'type' => 'curricular',
                'label' => '18A_Recommendation_01_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '18A_Recommendation_01_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => true,
            ],
            
            [
                'name' =>"18B.- Recommendation Letter",
                'type' => 'curricular',
                'label' => '18B_Recommendation_02_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '18B_Recommendation_02_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => true,
            ],*/
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('required_documents');
    }
}
