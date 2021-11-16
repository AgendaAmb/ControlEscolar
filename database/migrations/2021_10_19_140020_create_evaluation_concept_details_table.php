<?php

use App\Models\EvaluationConcept;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationConceptDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_concept_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluation_concept_id')
                ->constrained('evaluation_concepts')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('text', 512);
            $table->string('score_group');
            $table->softDeletes();
            $table->timestamps();
        });

        $models = [
            EvaluationConcept::create(['type' => 'basic','description' => 'Lengua extranjera.' ]),
            EvaluationConcept::create(['type' => 'basic','description' => 'EXANI.' ]),
            EvaluationConcept::create(['type' => 'basic','description' => 'Promedio de la licenciatura.' ]),
            EvaluationConcept::create(['type' => 'basic','description' => 'Promedio de la maestría.' ]),

            EvaluationConcept::create(['type' => 'academic','description' => '2.1 ¿Por qué desea realizar un posgrado en ciencias ambientales? Indique las razones académicas o personales por las cuales pretende realizar un posgrado de maestría/doctorado.' ]),
            EvaluationConcept::create(['type' => 'academic','description' => '2.2 ¿Por qué desea realizar su posgrado en el PMPCA? ¿Consideró otras opciones? Mencione cuáles' ]),
            EvaluationConcept::create(['type' => 'academic','description' => '2.3 ¿Por qué seleccionaste el área de interés que has marcado en tu solicitud?' ]),
            EvaluationConcept::create(['type' => 'academic','description' => '2.4.¿Qué expectativas tienes de un posgrado multidisciplinario? ' ]),
            EvaluationConcept::create(['type' => 'academic','description' => '2.5. ¿Qué habilidades, actitudes, aptitudes esperas adquirir en este posgrado multidisciplinario?  Valor agregado a tu formación' ]),
            EvaluationConcept::create(['type' => 'academic','description' => '2.6. ¿Qué áreas, líneas de investigación o disciplinas del posgrado consideras que se relacionarán o entrelazarán en tu formación de maestro/doctor de acuerdo con el tema de tu interés? ' ]),
            EvaluationConcept::create(['type' => 'academic','description' => '2.7. Tienes experiencia en trabajo de archivo o manejo de normativa y legislación aplicada a las ciencias ambientales' ]),
            EvaluationConcept::create(['type' => 'academic','description' => '2.8. ¿Qué estrategias empleas en una revisión bibliográfica? ¿Qué herramientas de consulta utilizas cuando realizas una revisión bibliográfica?' ]),
            EvaluationConcept::create(['type' => 'academic','description' => '2.9.  ¿Cuentas con experiencia en docencia? Menciona el nivel educativo y tiempo. ' ]),
            EvaluationConcept::create(['type' => 'academic','description' => '2.10. ¿Cuánto tiempo te tomó obtener el grado académico anterior? Maestría (ingreso a doctorado)/licenciatura (ingreso a maestría)' ]),

            EvaluationConcept::create(['type' => 'research','description' => '3.1  Has recibido algún reconocimiento o premio académico?' ]),
            EvaluationConcept::create(['type' => 'research','description' => '3.2. ¿Has hecho estancias acádemicas o cientificas?' ]),
            EvaluationConcept::create(['type' => 'research','description' => '3.3 ¿Has participado en Foros, Congresos o reuniones académicas?' ]),
            EvaluationConcept::create(['type' => 'research','description' => '3.4. Publicaciones científicas  (aplica sólo para aspirantes a doctorado)' ]),
            EvaluationConcept::create(['type' => 'research','description' => '3.5. Indica  el tipo de experiencia desarrollada en investigación' ]),

            EvaluationConcept::create(['type' => 'working_experience','description' => '4.1. ¿Actualmente laboras? ¿Esta relacionado con las ciencias ambientales?' ]),
            EvaluationConcept::create(['type' => 'working_experience','description' => '4.2. Resumen de experiencia profesional (Enfásis en ENREM)' ]),
            EvaluationConcept::create(['type' => 'personal_attributes','description' => '5.1. Se le pide al aspirante, que, en caso de no poder realizar su propuesta de investigación, explique brevemente otra opción o temática para realizar su investigación (ya sea en el área o problemática de sector). Evaluación de adaptación y creatividad' ]),
            EvaluationConcept::create(['type' => 'personal_attributes','description' => '5.2. ¿Tienes alguna certificación o capacitación o experiencia, ya sea curricular o no, que desees compartir con nosotros? (incluye idiomas, voluntariados, entre otros)' ]),
        ];


        $models[4]->evaluationConceptDetails()->createMany([
            ['score_group' => 'Excelente', 'text'=>'El aspirante describe de manera muy convicente sus razones académicas y personales para estudiar un posgrado. Describe adecuadamente las ciencias ambientales.'],
            ['score_group' => 'Muy bien', 'text'=>'El aspirante decribe de manera medianamente convicente sus razones académicas y personales para estudiar  un posgrado. Describe adecuadamente las ciencias ambientales.'],
            ['score_group' => 'Bien', 'text'=>'El aspirante decribe de manera poco convicente sus razones académicas y personales para estudiar  un posgrado. Describe adecuadamente las ciencias ambientales.'],
            ['score_group' => 'Deficiente', 'text'=>'El aspirante no tiene claro qué involucra realizar un posgrado.'],
        ]);

        $models[5]->evaluationConceptDetails()->createMany([
            ['score_group' => 'Excelente', 'text'=>'El aspirante justifica adecuadamente su interés en ingresar al PMPCA y menciona al menos otras dos opciones que consideró o incluso en las que inició trámites, para estudiar su posgrado en Ciencias Ambientales.'],
            ['score_group' => 'Muy bien', 'text'=>'El aspirante justifica bien su interés en ingresar al PMPCA y menciona al menos una opción adicional que consideró para estudiar su posgrado en Ciencias Ambientales.'],
            ['score_group' => 'Bien', 'text'=>'El aspirante justifica bien su interés en ingresar al PMPCA pero no consultó otras opciones.'],
            ['score_group' => 'Deficiente', 'text'=>'El aspirante no tiene claro porque desea estudiar en el PMPCA y no revisó otras opciones.'],
        ]);

        $models[6]->evaluationConceptDetails()->createMany([
            ['score_group' => 'Excelente', 'text'=>'Conoce las áreas del PMPCA e identifica claramente las líneas de investigación.'],
            ['score_group' => 'Muy bien', 'text'=>'Conoce las lineas de investigación de un área, pero desconoce las otras áreas del PMPCA.'],
            ['score_group' => 'Bien', 'text'=>'Conoce las lineas de investigación de un profesor, pero desconoce las áreas generales del PMPCA.'],
            ['score_group' => 'Deficiente', 'text'=>'El alumno sólo conversó con un profesor.'],
        ]);

        $models[7]->evaluationConceptDetails()->createMany([
            ['score_group' => 'Excelente', 'text'=>'El aspirante describe de forma sobresaliente la aportación de la multidisciplina a su formación.'],
            ['score_group' => 'Muy bien', 'text'=>'El aspirante  describe claramente la aportación de la multidisciplina a su formación.'],
            ['score_group' => 'Bien', 'text'=>'El aspirante  describe parcialmente su aportación o no le queda claro el concepto de multidisciplina.'],
            ['score_group' => 'Deficiente', 'text'=>'El aspirante  no tiene idea de la aportación  de la multidisciplina a su formación.'],
        ]);

        $models[8]->evaluationConceptDetails()->createMany([
            ['score_group' => 'Excelente', 'text'=>'El aspirante  reconoce DE FORMA SOBRESALIENTE las habilidades, aptitudes y actitudes en las que el posgrado puede contribuir a su formación.'],
            ['score_group' => 'Muy bien', 'text'=>'El aspirante  reconoce CLARAMENTE las habilidades, aptitudes y actitudes en las que el posgrado puede contribuir a su formación.'],
            ['score_group' => 'Bien', 'text'=>'El aspirante  reconoce DEBILMENTE las habilidades, aptitudes y actitudes en las que el posgrado puede contribuir a su formación.'],
            ['score_group' => 'Deficiente', 'text'=>'El aspirante  no tiene idea a que se refiere este apartado.'],
        ]);

        $models[9]->evaluationConceptDetails()->createMany([
            ['score_group' => 'Excelente', 'text'=>'El aspirante identifica claramente las áreas, líneas de investigación y disciplinas del posgrado  y las relaciona a su tema de interés.'],
            ['score_group' => 'Muy bien', 'text'=>'El estudiante conoce las áreas de investigación que se requieren para su tema pero no las tiene identificadas en el programa.'],
            ['score_group' => 'Bien', 'text'=>'El estudiante conoce las 5 áreas de posgrado pero no entiende cómo se relacionan con su tema de interés.'],
            ['score_group' => 'Deficiente', 'text'=>'El estudiante no conoce las areas de posgrado y tampoco reconoce las diferentes líneas de investigación que se requieren para su tema de interés.'],
        ]);

        $models[10]->evaluationConceptDetails()->createMany([
            ['score_group' => 'Excelente', 'text'=>'El aspirante demuestra contar con mucha experiencia en trabajo de archivo o manejo de normativa y legislación aplicada a las ciencias ambientales.'],
            ['score_group' => 'Muy bien', 'text'=>'El aspirante demuestra contar con alguna experiencia en trabajo de archivo o manejo de normativa y legislación aplicada a las ciencias ambientales.'],
            ['score_group' => 'Bien', 'text'=>'El aspirante demuestra contar con poca experiencia en trabajo de archivo o manejo de normativa y legislación aplicada a las ciencias ambientales.'],
            ['score_group' => 'Deficiente', 'text'=>'El aspirante no demuestra contar con experiencia en trabajo de archivo o manejo de normativa y legislación aplicada a las ciencias ambientales.'],
        ]);

        $models[11]->evaluationConceptDetails()->createMany([
            ['score_group' => 'Excelente', 'text'=>'El aspirante menciona diversas estrategias y herramientas como bases de datos, consulta de libros en sala, Internet, etc.'],
            ['score_group' => 'Muy bien', 'text'=>'El aspirante menciona algunas estrategias y herramientas como bases de datos, consulta de libros en sala, Internet, etc.'],
            ['score_group' => 'Bien', 'text'=>'El aspirante menciona sólo una estrategia y herramienta como bases de datos, consulta de libros en sala, Internet, etc.'],
            ['score_group' => 'Deficiente', 'text'=>'El aspirante no menciona estrategias y herramientas como bases de datos, consulta de libros en sala, Internet, etc.'],
        ]);

        $models[12]->evaluationConceptDetails()->createMany([
            ['score_group' => 'Excelente', 'text'=>'Cuenta con experiencia docente en nivel superior.'],
            ['score_group' => 'Muy bien', 'text'=>'Cuenta con experiencia docente en nivel medio superior o secundaria.'],
            ['score_group' => 'Bien', 'text'=>'No cuenta con experiencia docente pero manifiesta estar interesado en impartir docencia.'],
            ['score_group' => 'Deficiente', 'text'=>'No cuenta con experiencia docente y manifiesta no estar interesado en impartir docencia.'],
        ]);

        $models[13]->evaluationConceptDetails()->createMany([
            ['score_group' => 'Excelente', 'text'=>'El aspirante obtuvo el grado académico anterior en el tiempo establecido por el plan de estudios.'],
            ['score_group' => 'Muy bien', 'text'=>'El aspirante obtuvo el grado académico anterior entre 1.1-1.5 veces el tiempo que establece el plan de estudios.'],
            ['score_group' => 'Bien', 'text'=>'El aspirante obtuvo el grado académico anterior entre 1.5-1.9 veces el tiempo que establece el plan de estudios.'],
            ['score_group' => 'Deficiente', 'text'=>'El aspirante obtuvo el grado académico anterior en más de 2 veces el tiempo que establece el plan de estudios.'],
        ]);

        $models[19]->evaluationConceptDetails()->createMany([
            ['score_group' => 'Excelente', 'text'=>'El estudiante labora y su actividad está relacionada con las ciencias ambientales. Esta dispuesto a dejar de laborar.En caso de ser recién egresado favor de considerar en este punto.'],
            ['score_group' => 'Muy bien', 'text'=>'El estudiante labora pero su actividad no esta relacionada con las ciencias ambientales. Dejará su trabajo para ingresar al posgrado.'],
            ['score_group' => 'Bien', 'text'=>'El estudiante tiene formación ambiental pero actualmente no labora.'],
            ['score_group' => 'Deficiente', 'text'=>'No estudia, ni labora.'],
        ]);

        $models[20]->evaluationConceptDetails()->createMany([
            ['score_group' => 'Excelente', 'text'=>'Experiencia profesiona igual o mayor a 5 años.'],
            ['score_group' => 'Muy bien', 'text'=>'Experiencia profesional igual o menor a 3 años.'],
            ['score_group' => 'Bien', 'text'=>'Experiencia profesional igual o menor a 2 años.'],
            ['score_group' => 'Deficiente', 'text'=>'Sin experiencia profesional.'],
        ]);

        $models[21]->evaluationConceptDetails()->createMany([
            ['score_group' => 'Excelente', 'text'=>'El estudiante muestra confianza en la opción alternativa, dando razones apropiadas para realizarla. Además, describe adecuadamente su multidisciplina.'],
            ['score_group' => 'Muy bien', 'text'=>'El estudiante describe la opción alternativa, pero no puede describir claramente la multidisciplina.'],
            ['score_group' => 'Bien', 'text'=>'El estudiante duda en una opción alternativa e insiste en que su proyecto original es viable.'],
            ['score_group' => 'Deficiente', 'text'=>'El estudiante no puede dar una opción.'],
        ]);

        $models[22]->evaluationConceptDetails()->createMany([
            ['score_group' => 'Excelente', 'text'=>'Cuenta con certificaciones en otros idiomas o tiene varias capacitaciones extracurriculares.'],
            ['score_group' => 'Muy bien', 'text'=>'El estudiante esta cursando actualmente capacitaciones.'],
            ['score_group' => 'Bien', 'text'=>'El estudiante tienen algún intento de certificación (en qué).'],
            ['score_group' => 'Deficiente', 'text'=>'El estudiante no cuenta con atributos extracurriculares.'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation_concept_details');
    }
}
