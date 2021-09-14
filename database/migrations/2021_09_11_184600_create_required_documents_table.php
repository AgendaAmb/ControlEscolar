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
            $table->string('notes', 100)->nullable();
            $table->string('format_url', 150)->nullable();
            $table->boolean('intention_letter')->default(false);
            $table->boolean('recommendation_letter')->default(false);

            $table->index('name', 'required_document_name', 'btree');
            $table->softDeletes();
        });

        DB::table('required_documents')->insert([
            # Todos
            [
                'name' =>"1.- Acta de nacimiento.",
                'type' => 'personal',
                'label' => "01_ActaNac_AñoDeSolicitud_iniciales(Apellidos,Nombres)",
                'example' => '01_ActaNac_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"2.- CURP en Ampliación tamaño carta.",
                'type' => 'personal',
                'label' => '02_CURP_añodesolicitud_iniciales',
                'example' => '02_CURP_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"3.- Credencial de elector INE en ampliación tamaño carta.",
                'type' => 'personal',
                'label' => '03_INE_añodesolicitud_iniciales',
                'example' => '03_INE_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"4.- Primera página del pasaporte.",
                'type' => 'personal',
                'label' => '04_Pasaporte_añodesolicitud_iniciales',
                'example' => '04_Pasaporte_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

            # Solo maestrías.
            [
                'name' =>"5.- Título de licenciatura o acta de examen.",
                'type' => 'academic',
                'label' => '05A_TitLicenciatula_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                'example' => '05A_TitLicenciatula_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Solo IMAREC
            [
                'name' =>"5.- Carta de pasantía.",
                'type' => 'academic',
                'label' => '05B_CartaPasante_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                'example' => '05B_CartaPasante_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Solo doctorado.
            [
                'name' =>"5.- Título de maestría o acta de examen.",
                'type' => 'academic',
                'label' => '05B_TítuloMat_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                'example' => '05B_TítuloMat_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Solo maestrías.
            [
                'name' =>"6.- Certificado de materias de la licenciatura.",
                'type' => 'academic',
                'label' => '06B_CertLic_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                'example' => '06B_CertfLic_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Solo doctorado.
            [
                'name' =>"6.- Certificado de materias de la maestría.",
                'type' => 'academic',
                'label' => '06B_CertMast_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                'example' => '06B_CertfMast_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Solo maestrías.
            [
                'name' =>"7A.- Certificado de promedio de la licenciatura.",
                'type' => 'academic',
                'label' => '07A_PromedioLic_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                'example' => '07A_PromedioLic_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

            # Solo doctorado.
            [
                'name' =>"7B.- Certificado de promedio de la maestría.",
                'type' => 'academic',
                'label' => '07B_PromedioMae_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                'example' => '07B_PromedioMae_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Solo maestrías.
            [
                'name' =>"8A.- Cédula de la licenciatura (aplica solo para estudios realizados en México).",
                'type' => 'academic',
                'label' => '08A_Cédula_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                'example' => '08A_Cédula_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],


            # Solo doctorado.
            [
                'name' =>"8B.- Cédula de la maestría (aplica solo para estudios realizados en México).",
                'type' => 'academic',
                'label' => '08B_Cédula_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                'example' => '08B_Cédula_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"12.- Resultados del EXANI III vigente (no aplica a estudiantes extranjeros).",
                'type' => 'entrance',
                'label' => '12B_EXANIIII_añodesolicitud_iniciales',
                'example' => '12B_EXANIIII_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"13A.- Certificado de idioma inglés vigente.",
                'type' => 'entrance',
                'label' => '13A_Inglés_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                'example' => '13A_Inglés_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"13B.-Certificado de idioma español.",
                'type' => 'entrance',
                'label' => '13B_Español_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                'example' => '13B_Español_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"14.- Carta de intención de un profesor del núcleo básico.",
                'type' => 'entrance',
                'label' => '14_Intencion_añodesolicitud_iniciales',
                'example' => '14_Intencion_2021_CJG',
                'intention_letter' => true,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"15.- Propuesta de proyecto avalada por el profesor postulante.",
                'type' => 'entrance',
                'label' => '15_Proyecto_iniciales',
                'example' => '15_Proyecto_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"16.- Currículum Vítae con los documentos probatorios (formato líbre).",
                'type' => 'curricular',
                'label' => '16_CV_añodesolicitud_iniciales',
                'example' => '16_CV_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            [
                'name' =>"18A.- Carta de recomendación.",
                'type' => 'curricular',
                'label' => '18A_Recomendación_01_añodesolicitud_iniciales',
                'example' => '18A_Recomendación_01_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => true,
            ],
            
            # Todos
            [
                'name' =>"18B.- Carta de recomendación.",
                'type' => 'curricular',
                'label' => '18B_Recomendación_02_añodesolicitud_iniciales',
                'example' => '18B_Recomendación_02_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => true,
            ],

            [
                'name' =>"1.- Birth Certificate",
                'type' => 'personal',
                'label' => "01_BirthCert_iniciales",
                'example' => '01_BirthCert_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"2.- CURP",
                'type' => 'personal',
                'label' => '02_CURP_añodesolicitud_iniciales',
                'example' => '02_CURP_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"3.- INE",
                'type' => 'personal',
                'label' => '03_INE_añodesolicitud_iniciales',
                'example' => '03_INE_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"4.- Passport",
                'type' => 'personal',
                'label' => '04_Pasaporte_añodesolicitud_iniciales',
                'example' => '04_Pasaporte_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"5.- High School Certificate",
                'type' => 'academic',
                'label' => '05_HighSchool_iniciales',
                'example' => '05_HighSchool_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"5A.- Bachelor Degree",
                'type' => 'academic',
                'label' => '05A_DegreeBachelor_iniciales',
                'example' => '05A_DegreeBachelor_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"6.- Bachelor Transcript",
                'type' => 'academic',
                'label' => '06A_TranscriptBachelor_iniciales',
                'example' => '06A_TranscriptBachelor_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"7.- Final Grade Average of Bachelor Degree",
                'type' => 'academic',
                'label' => '07A_PromBachelor_iniciales',
                'example' => '07A_PromBachelor_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"8.- Professional License",
                'type' => 'academic',
                'label' => '08A_ProfessionalLicense_iniciales',
                'example' => '08A_ProfessionalLicense_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"9.- ENREM Application Form",
                'type' => 'entrance',
                'label' => '09A_Application_iniciales',
                'example' => '09A_Application_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"9A.- DAAD Application Form",
                'type' => 'entrance',
                'label' => '09A_DAAD_iniciales',
                'example' => '09A_DAAD_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"13A.- Proof of English Proficiency",
                'type' => 'entrance',
                'label' => '13A_English_iniciales',
                'example' => '13A_English_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"13B.- Proof of Spanish Proficiency",
                'type' => 'entrance',
                'label' => '13B_Spanish_iniciales',
                'example' => '13B_English_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"13C.- Proof of German Proficiency",
                'type' => 'entrance',
                'label' => '13C_German_iniciales',
                'example' => '13C_German_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"15.- Project idea",
                'type' => 'entrance',
                'label' => '15_ProjectIdea_iniciales',
                'example' => '15_ProjectIdea_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"16.- Currículum Vítae",
                'type' => 'curricular',
                'label' => '16_CV_añodesolicitud_iniciales',
                'example' => '16_CV_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"17A.- Certificate(s) of Employment/Internship",
                'type' => 'curricular',
                'label' => '17A_ProofExperience_iniciales',
                'example' => '17A_ProofExperience_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"17B.- Confirmation of employment",
                'type' => 'curricular',
                'label' => '17B_ConfirmationEmp_iniciales',
                'example' => '17B_ConfirmationEmp_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            [
                'name' =>"18A.- Recommendation Letter",
                'type' => 'curricular',
                'label' => '18A_Recommendation_01_añodesolicitud_iniciales',
                'example' => '18A_Recommendation_01_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => true,
            ],
            
            [
                'name' =>"18B.- Recommendation Letter",
                'type' => 'curricular',
                'label' => '18B_Recommendation_02_añodesolicitud_iniciales',
                'example' => '18B_Recommendation_02_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => true,
            ],
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
