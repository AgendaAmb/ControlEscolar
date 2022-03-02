<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateRecommendationLetterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //datos para la carta de recomendacion y se llenaran en el form 

        /*
        DATOS DE CANDIDATO
        
        Primera columna: 
        > Id del usuario (Nombre, carrera actual o terminada, nacionalidad)
        > Id academic areas (numero de telefono, correo)
        
        
        > Id del periodo (Convocatoria a la que pertence)
        > Id Academic programs (nombre de academia a la que aspira)
        > Id academic areas (nombre area encargada) (EL MISMO)
        
        RELACION DE CANDIDATO
        > timeToMeet (Tiempo de conocer candidato)
        > HowMeet (Como lo conocio)
        > KindRelationship (Tipo de relacion)
        > experienceWithCandidate (experiencia en tareas)
        > qualificationStudent (como lo califica conforme a otros)
        
        ANALISIS DE CANDIDATO
        > parameters : Object {String, Value (Deficiente,Regular,Bueno,Excelente) } (Cosas que calificar)
                > Crear otra tabla para definir parametros
                    Parametros definidos por default
                        Id
                        Texto

                > Crear otra tabla para guardar calificaciones de parametros por alumnos
                        Id del parametro
                        Id de la carta de recomendacion a la que se hace referencia
                        Calificacion

        > other_skills : Object {String, Value (Deficiente,Regular,Bueno,Excelente) } (Cosas a calificar personalizadas)
                > Crear otra tabla para definir parametros personalizados
                    (Como es opcional entonces) : 
                        Requiere Id de carta de recomendacion a la que hace referencia
                        Texto
                        Calificacion
                        
        > special_skills : String (Hablidades a destacar) 
        > why_recommendation : String (Por que se recomienda)

        >authorization (lo recibe para poder guardar)
        */
        //campos de carta de recomendacion
        Schema::create('recommendation_letter', function (Blueprint $table) {
            $table->id(); //llave primaria

            //user letter relacion
            //a quien se dirige la carta
            $table->foreignId('archive_id')
                ->constrained('archives')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //relation with the candidate (solo email)

            //Validation to answer the letter
            
            //Quien responde la carta
            $table->string('email_evaluator')->nullable();

            //token con el cual se manda por la liga
            $table->string('token')->nullable();
            $table->bigInteger('answer')->nullable();



            $table->string('time_to_meet')->nullable();
            $table->string('how_meet')->nullable();
            $table->string('kind_relationship')->nullable();
            $table->string('experience_with_candidate')->nullable();
            $table->string('qualification_student')->nullable();

            //ANALISIS DE CANDIDATO
            $table->string('special_skills')->nullable();
            $table->string('why_recommendation')->nullable();

            # Estados de control
            $table->softDeletes();
            $table->timestamps();
        });

        //transformar a pdf el documento y guardarlo tambien 

        //datos para indicar la direccion hacia el tipo de documento requerido 

        //relacion de documento necesario en pdf para postulante
        Schema::create('archive_recommendation_letter', function (Blueprint $table) {

            //recommendation letter relacion
            $table->foreignId('rl_id')
                ->constrained('recommendation_letter')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //relacion hacia documentos requeridos
            $table->foreignId('required_document_id')
                ->constrained('archive_required_document')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('location')->nullable();
            # Estados de control
            $table->softDeletes();
            $table->timestamps();
            // $table->primary(['rl_id', 'required_document_id'], 'pk_doc_rec_lett'); //llave de pntaje a parametro definido
        });

        //Parametros de analisis de candidato
        Schema::create('parameters_recommendation_letter', function (Blueprint $table) {
            //llave primaria
            $table->id();

            //datos o campos a rellenar
            $table->string('text')->nullable();

            # Estados de control
            $table->softDeletes();
            $table->timestamps();
        });

        //datos para indicar la direccion hacia el tipo de documento requerido 
        Schema::create('score_paremeters_rl', function (Blueprint $table) {

            //recommendation letter relacion
            $table->foreignId('rl_id')
                ->constrained('recommendation_letter')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //parametros de recommendation letter relacion
            $table->foreignId('parameter_id')
                ->constrained('parameters_recommendation_letter')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->string('score')->nullable();
            //se ponen como llaves primarias 
            $table->primary(['rl_id', 'parameter_id'], 'pk_score_par'); //llave de pntaje a parametro definido
            # Estados de control
            $table->softDeletes();
            $table->timestamps();
        });

        //Parametros de analisis de candidato Personalizads
        Schema::create('custom_parameters_rl', function (Blueprint $table) {
            //llave primaria
            $table->id();

            //recommendation letter relacion
            $table->foreignId('rl_id')
                ->constrained('recommendation_letter')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('text')->nullable();
            $table->string('score')->nullable();

            # Estados de control
            $table->softDeletes();
            $table->timestamps();
        });

        //scores en 
        // Schema::create('scores_rl', function (Blueprint $table) {
        //     $table->id(); //clave primaria
        //     $table->string('score')->nullable(); //score
        // });

        // DB::table('parameters_recommendation_letter')->insert([
        //     ['score'=>'Deficiente'],
        //     ['score'=>'Regular'],
        //     ['score'=>'Bueno'],
        //     ['score'=>'Excelente'],
        // ]);

        //Insertar los parametros y modificar desde aqui
        DB::table('parameters_recommendation_letter')->insert([
            ['text' => 'Conocimiento y destrezas en su campo'],
            ['text' => 'Dedicación al trabajo'],
            ['text' => 'Imaginación y creatividad'],
            ['text' => 'Habilidad para comunicarse'],
            ['text' => 'Rendimiento'],
            ['text' => 'Perseverancia'],
            ['text' => 'Capacidad de convivencia con otras personas'],
            ['text' => 'Disciplina de estudio'],
            ['text' => 'Habilidad de investigación'],
            ['text' => 'Habilidades de comunicación oral y escrita'],
            ['text' => 'Hábitos de trabajo'],
            ['text' => 'Organización'],
            ['text' => 'Planificación'],
            ['text' => 'Oportunidad'],
            ['text' => 'Colaboración en equipo'],
            ['text' => 'Iniciativa propia'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //carta de recomendacion

        Schema::dropIfExists('archive_recommendation_letter'); //documento en pdf
        Schema::dropIfExists('score_paremeters_recommendation_letter');     //puntaje de cada parametro por carta de recomendacion
        Schema::dropIfExists('custom_parameters_recommendation_letter');    //parametros personalizados por usuario
        Schema::dropIfExists('parameters_recommendation_letter');           //parametros fijos a hacer referencia
        Schema::dropIfExists('recommendation_letter'); //datos crudos
    }
}
