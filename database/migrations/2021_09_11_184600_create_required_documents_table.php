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
            # 01_ActaNac
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
            # 02_CURP
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
            # 03_INE
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
            # 04_Pasaporte
            [
                'name' =>"4.- Primera página del pasaporte",
                'type' => 'personal',
                'label' => '04_Pasaporte_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '04_Pasaporte_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

            # Solo ENREM
            # 05A_TituloLic/ActaExamen
            [
                'name' =>"5.- Título de preparatoria",
                'type' => 'academic',
                'label' => '05A_HighSchool_YearAppliant_Initials(LastName,Name-MiddleName)',                
                'notes' => null,
                'example' => '05A_HighSchool_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

            # Solo maestrías.
            # 05A_TituloLic/ActaExamen
            [
                'name' =>"5A.- Título de licenciatura o acta de examen",
                'type' => 'academic',
                'label' => '05A_TitLicenciatula_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '05A_TitLicenciatula_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

            # Solo doctorado
            # 05B_TituloMast/ActExamen
            [
                'name' =>"5B.- Título de Maestria o acta de examen",
                'type' => 'academic',
                'label' => '05A_TitMaestria_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '05A_TitMaestria_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Solo IMAREC
            # 05C_CartaDePasante
            [
                'name' =>"5C.- Carta de pasantía",
                'type' => 'academic',
                'label' => '05C_CartaPasante_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '05C_CartaPasante_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
           
            
            # Solo maestrías.
            # 06A_CertificLic
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
            # 06B_CertificadoMaest
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
            # 07A_PromedioLic
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
            # 07B_PromedioMaes
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
            # 08A_Cedula_Lic
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
            # 08B_Cedula_Maestria
            [
                'name' =>"8B.- Cédula de la maestría",
                'type' => 'academic',
                'label' => '08B_Cédula_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '08B_Cédula_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

            # Solo EMREC
            # 09 Application 
            [
                'name' =>"9.- Application",
                'type' => 'entrance',
                'label' => '9_Application_YearApplication_initials(LastName,Names)',                
                'notes' => null,
                'example' => '09_Application_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

             # Solo EMREC.
             # 09 Application DAAD
             [
                'name' =>"9A.- Application DAAD",
                'type' => 'entrance',
                'label' => '9A_ApplicationDAAD_YearApplication_initials(LastName,Names)',                
                'notes' => null,
                'example' => '09A_ApplicationDAAD_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

            # 10 llenado en linea (Exposicion de motivos)

            # Todos
            # Carta compromiso (llenado en linea, espoxision de motivos )
            [
                'name' =>"11.- Carta compromiso y de manifestación de lineamientos (firmada y escaneada)",
                'type' => 'entrance',
                'label' => '11_CartaCompromiso_añodesolicitud_iniciales',      
                'notes' => null,          
                'example' => '11_CartaCompromiso_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

            # Todos, excepto EMREC
            #12 Carta de intencion
            [
                'name' =>"12.- Carta de intención de un profesor del núcleo básico (el profesor la envía directamente)",
                'type' => 'entrance',
                'label' => '12_Intencion_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '12_Intencion_2021_CJG',
                'intention_letter' => true,
                'recommendation_letter' => false,
            ],

            
            # Todos, excepto EMREC
            #13 EXANII
            [
                'name' =>"13.- Resultados del EXANI III vigente (no aplica a estudiantes extranjeros)",
                'type' => 'entrance',
                'label' => '13_EXANIIII_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '13_EXANIIII_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

            # Solo Doctorado y EMREC
            # 14_Proyecto_en_PDF_6Cuartillas
            [
                'name' =>"14.- Propuesta de proyecto avalada por el profesor postulante",
                'type' => 'entrance',
                'label' => '14_Proyecto_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '14_Proyecto_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],


            # Todos
            # 15_Certificad_Idiomas
            [
                'name' =>"15.- Certificado de idioma vigente",
                'type' => 'language',
                'label' => '15_Idioma_AñoDeSolicitud_iniciales(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '15_Idioma_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

            # Solo EMREC
            # 16.- ProofExperienceDocument
            [
                'name' =>"16.- Proof Experience Document",
                'type' => 'working',
                'label' => '16_ProofExperience_YearAppliant_initials(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '15_ProofExperience_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

            # Solo EMREC
            # 17.- ConfirmationEMP
            [
                'name' =>"17.- ConfirmationEMP",
                'type' => 'working',
                'label' => '17_ConfirmationEMP_YearAppliant_initials(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '17_ConfirmationEMP_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],

            # Solo EMREC
            # 18.- FormatoEuropass
            [
                'name' =>"18.- FormatoEuropass",
                'type' => 'curricular',
                'label' => '18._FormatoEuropass_YearAppliant_initials(Apellidos,Nombres)',                
                'notes' => null,
                'example' => '17_ConfirmationEMP_2021_CJG',
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
            
            # Todos
            # 19.- Propuesta de proyecto
            [
                'name' =>"19A.- Carta de recomendación",
                'type' => 'recommendation',
                'label' => '19A_Recomendación_01_añodesolicitud_iniciales',                
                'notes' => null,
                'example' => '18A_Recomendación_01_2021_CJG',
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
