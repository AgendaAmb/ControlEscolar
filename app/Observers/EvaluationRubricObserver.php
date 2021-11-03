<?php

namespace App\Observers;

use App\Models\EvaluationConcept;
use App\Models\EvaluationRubric;
use Illuminate\Support\Facades\Storage;

class EvaluationRubricObserver
{
    /**
     * Creates the evaluation rubric research experience metadata.
     *
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return void
     */
    private function addMetadata(EvaluationRubric $evaluationRubric)
    {
        $research_concepts = EvaluationConcept::type('research')->pluck('id')->toArray();
        $metadata = [
            /**
             * 3.1 Has recibido algún recono-
             * cimiento o premio académico?
             */
            [ 
                'id' => $research_concepts[0],
                'group' => 'Excelent',
                'type' => 'radio',
                'label' => 'Premio por méritos en investigación',
                'choices' => ['Sí','No'],
                'value' => null,
            ],[ 
                'id' => $research_concepts[0],
                'group' => 'Excelent',
                'type' => 'radio',
                'label' => 'Mejor promedio de generación',
                'choices' => ['Maestría','Licenciatura'],
                'value' => null,
            ],[ 
                'id' => $research_concepts[0],
                'group' => 'Excelent',
                'type' => 'textarea',
                'label' => 'Institución que lo otorga:',
                'value' => null,
            ],
            
            
            [ 
                'id' => $research_concepts[0],
                'group' => 'Very_Good',
                'type' => 'radio',
                'label' => 'Premio a mejor ponencia en congreso que se realice en colaboración con algún grupo',
                'choices' => ['Nacional','Internacional'],
                'value' => null,
            ],[ 
                'id' => $research_concepts[0],
                'group' => 'Very_Good',
                'type' => 'textarea',
                'label' => 'Nombre del evento:',
                'value' => null,
            ],
            
            
            [ 
                'id' => $research_concepts[0],
                'group' => 'Good',
                'type' => 'textarea',
                'label' => 'Reconocimiento en evento regional/local:',
                'value' => null,
            ],
            
            [ 
                'id' => $research_concepts[0],
                'group' => 'Goofy',
                'type' => false,
                'label' => 'Sin ningún reconocimiento.',
                'value' => null,
            ],

            /**
             * 3.2 ¿Has hecho estancias acádemicas
             * o cientificas?
             */
            [ 
                'id' => $research_concepts[1],
                'group' => 'Excelent',
                'type' => 'header',
                'header' => 'Entidades internacionales'
            ],[ 
                'id' => $research_concepts[1],
                'group' => 'Excelent',
                'type' => 'textarea',
                'label' => 'Nombre de la institución:',
                'value' => null,
            ],
            
            
            [ 
                'id' => $research_concepts[1],
                'group' => 'Very_Good',
                'type' => 'header',
                'header' => 'Entidades nacionales'
            ],[ 
                'id' => $research_concepts[1],
                'group' => 'Very_Good',
                'type' => 'textarea',
                'label' => 'Nombre de la institución:',
                'value' => null,
            ],
            
            [ 
                'id' => $research_concepts[1],
                'group' => 'Good',
                'type' => 'header',
                'header' => 'Entidades regionales/locales'
            ],[ 
                'id' => $research_concepts[1],
                'group' => 'Good',
                'type' => 'textarea',
                'label' => 'Nombre de la institución:',
                'value' => null,
            ],
            
            [ 
                'id' => $research_concepts[1],
                'group' => 'Goofy',
                'type' => false,
                'label' => 'Sin estancias académicas.',
                'value' => null,
            ],


            /**
             * 3.3 ¿Has participado en Foros, 
             * Congresos o reuniones académicas?
             */
            [ 
                'id' => $research_concepts[2],
                'group' => 'Excelent',
                'type' => 'header',
                'header' => 'Ponente evento internacional'
            ],[ 
                'id' => $research_concepts[2],
                'group' => 'Excelent',
                'type' => 'textarea',
                'label' => 'Nombre y título de la ponencia:',
                'value' => null,
            ],[ 
                'id' => $research_concepts[2],
                'group' => 'Excelent',
                'type' => 'radio',
                'label' => 'Grado académico en el que realizó la tesis',
                'choices' => ['Nacional','Internacional'],
                'value' => null,
            ],[ 
                'id' => $research_concepts[2],
                'group' => 'Excelent',
                'type' => 'text',
                'label' => 'Resultado obtenido:',
                'value' => null,
            ],[ 
                'id' => $research_concepts[2],
                'group' => 'Excelent',
                'type' => 'textarea',
                'label' => 'Financiamiento:',
                'value' => null,
            ],
            
            [ 
                'id' => $research_concepts[2],
                'group' => 'Very_Good',
                'type' => 'header',
                'header' => 'Ponente evento nacional'
            ],[ 
                'id' => $research_concepts[2],
                'group' => 'Very_Good',
                'type' => 'textarea',
                'label' => 'Nombre y título ponencia:',
                'value' => null,
            ],[ 
                'id' => $research_concepts[2],
                'group' => 'Very_Good',
                'type' => 'radio',
                'label' => 'Grado académico en el que realizó la tesis',
                'choices' => ['Nacional','Internacional'],
                'value' => null,
            ],[ 
                'id' => $research_concepts[2],
                'group' => 'Very_Good',
                'type' => 'text',
                'label' => 'Resultado obtenido:',
                'value' => null,
            ],[ 
                'id' => $research_concepts[2],
                'group' => 'Very_Good',
                'type' => 'textarea',
                'label' => 'Financiamiento:',
                'value' => null,
            ],
            
            
            [ 
                'id' => $research_concepts[2],
                'group' => 'Good',
                'type' => 'header',
                'header' => 'Ponente evento local'
            ],[ 
                'id' => $research_concepts[2],
                'group' => 'Good',
                'type' => 'textarea',
                'label' => 'Nombre y título ponencia:',
                'value' => null,
            ],[ 
                'id' => $research_concepts[2],
                'group' => 'Good',
                'type' => 'radio',
                'label' => 'Grado académico en el que realizó la tesis',
                'choices' => ['Nacional','Internacional'],
                'value' => null,
            ],[ 
                'id' => $research_concepts[2],
                'group' => 'Good',
                'type' => 'text',
                'label' => 'Resultado obtenido:',
                'value' => null,
            ],[ 
                'id' => $research_concepts[2],
                'group' => 'Good',
                'type' => 'textarea',
                'label' => 'Financiamiento:',
                'value' => null,
            ],
            
            [ 
                'id' => $research_concepts[2],
                'group' => 'Goofy',
                'type' => 'header',
                'header' => 'Asistente a congresos, foros o seminarios'
            ],[ 
                'id' => $research_concepts[2],
                'group' => 'Goofy',
                'type' => 'textarea',
                'label' => 'Nombre y título ponencia:',
                'value' => null,
            ],


            /**
             * 3.4. Publicaciones científicas 
             * (aplica sólo para aspirantes a doctorado)
             */
            [ 
                'id' => $research_concepts[3],
                'group' => 'Excelent',
                'type' => 'radio',
                'label' => 'Artículo científico',
                'choices' => ['Como autor','Como co-autor'],
                'value' => null,
            ],[ 
                'id' => $research_concepts[3],
                'group' => 'Excelent',
                'type' => 'radio',
                'label' => 'Capítulo de Libro',
                'choices' => ['Como autor','Como co-autor'],
                'value' => null,
            ],[ 
                'id' => $research_concepts[3],
                'group' => 'Excelent',
                'type' => 'textarea',
                'label' => 'Nombre de la revista o libro:',
                'value' => null,
            ],[ 
                'id' => $research_concepts[3],
                'group' => 'Excelent',
                'type' => 'textarea',
                'label' => 'Nombre de la publicación',
                'value' => null,
            ],



            [ 
                'id' => $research_concepts[3],
                'group' => 'Very_Good',
                'type' => 'radio',
                'label' => 'Memoria en extenso',
                'choices' => ['Como autor','Como co-autor'],
                'value' => null,
            ],[ 
                'id' => $research_concepts[3],
                'group' => 'Very_Good',
                'type' => 'textarea',
                'label' => 'Nombre del evento:',
                'value' => null,
            ],[ 
                'id' => $research_concepts[3],
                'group' => 'Very_Good',
                'type' => 'textarea',
                'label' => 'Nombre de la publicación',
                'value' => null,
            ],


            [ 
                'id' => $research_concepts[3],
                'group' => 'Good',
                'type' => 'header',
                'label' => 'Revista de divulgación científica, programa de radio / televisión o congreso estudiantil'
            ],[ 
                'id' => $research_concepts[3],
                'group' => 'Good',
                'type' => 'textarea',
                'label' => 'Nombre de la revista:',
                'value' => null,
            ],[ 
                'id' => $research_concepts[3],
                'group' => 'Good',
                'type' => 'textarea',
                'label' => 'Nombre de la publicación',
                'value' => null,
            ],

            [ 
                'id' => $research_concepts[3],
                'group' => 'Goofy',
                'type' => false,
                'label' => 'Sin publicaciones.',
                'value' => null,
            ],

            /**
             * 3.5. Indica el tipo de experiencia desarrollada 
             * en investigación.
             */
            [ 
                'id' => $research_concepts[4],
                'group' => 'Excelent',
                'type' => 'radio',
                'label' => 'a) Tesis de licenciatura con trabajo de campo:',
                'choices' => ['Si','No'],
                'value' => null,
            ],[ 
                'id' => $research_concepts[4],
                'group' => 'Excelent',
                'type' => 'radio',
                'label' => 'b) Trabajo de laboratorio:',
                'choices' => ['Química','Biológica','SIGyPR','Informático'],
                'value' => null,
            ],[ 
                'id' => $research_concepts[4],
                'group' => 'Excelent',
                'type' => 'radio',
                'label' => 'c) Recolección y levantamiento de muestras:',
                'choices' => ['Biológicas','Serológicas','Entrevista-encuesta','Puntos georreferenciados','Archivos'],
                'value' => null,
            ],[ 
                'id' => $research_concepts[4],
                'group' => 'Excelent',
                'type' => 'textarea',
                'label' => 'd) Otra',
                'value' => null,
            ],

            [ 
                'id' => $research_concepts[4],
                'group' => 'Very_Good',
                'type' => 'header',
                'header' => 'Prácticas profesionales / servicio social'
            ],[ 
                'id' => $research_concepts[4],
                'group' => 'Very_Good',
                'type' => 'textarea',
                'label' => 'Institución:',
                'value' => null,
            ],[ 
                'id' => $research_concepts[4],
                'group' => 'Very_Good',
                'type' => 'textarea',
                'label' => 'Nombre del investigador o proyecto:',
                'value' => null,
            ],[ 
                'id' => $research_concepts[4],
                'group' => 'Very_Good',
                'type' => 'radio',
                'label' => 'Otros cursos, talleres y/o participaciones',
                'choices' => ['Talleres participativos','Cartografía participativa','Laboratorio de derechos humanos','Clínica de salud comunitaria'],
                'value' => null,
            ],

            [ 
                'id' => $research_concepts[4],
                'group' => 'Good',
                'type' => 'header',
                'header' => 'Apoyo a la investigación'
            ],[ 
                'id' => $research_concepts[4],
                'group' => 'Good',
                'type' => 'textarea',
                'label' => 'Institución:',
                'value' => null,
            ],[ 
                'id' => $research_concepts[4],
                'group' => 'Good',
                'type' => 'textarea',
                'label' => 'Nombre del investigador o proyecto:',
                'value' => null,
            ],[ 
                'id' => $research_concepts[4],
                'group' => 'Good',
                'type' => 'textarea',
                'label' => 'Descripción de actividades',
                'value' => null,
            ],


            [ 
                'id' => $research_concepts[4],
                'group' => 'Goofy',
                'type' => 'header',
                'label' => 'Otro',
            ],[ 
                'id' => $research_concepts[4],
                'group' => 'Goofy',
                'type' => false,
                'label' => 'No hizo tesis y no tiene experiencia en investigación',
                'value' => null,
            ],
        ];

        $metadata = json_encode($metadata, JSON_PRETTY_PRINT);
        $filename = implode('/', ['evaluation_rubrics',$evaluationRubric->id]);

        Storage::put($filename, $metadata);
    }

    /**
     * Handle the EvaluationRubric "created" event.
     *
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return void
     */
    public function created(EvaluationRubric $evaluationRubric)
    {
        $evaluationRubric->evaluationConcepts()->attach(EvaluationConcept::type('basic')->pluck('id'));
        $evaluationRubric->evaluationConcepts()->attach(EvaluationConcept::type('academic')->pluck('id'));
        $evaluationRubric->evaluationConcepts()->attach(EvaluationConcept::type('research')->pluck('id'));
        $evaluationRubric->evaluationConcepts()->attach(EvaluationConcept::type('working_experience')->pluck('id'));
        $evaluationRubric->evaluationConcepts()->attach(EvaluationConcept::type('personal_attributes')->pluck('id'));

        $this->addMetadata($evaluationRubric);
    }

    /**
     * Handle the EvaluationRubric "updated" event.
     *
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return void
     */
    public function updated(EvaluationRubric $evaluationRubric)
    {
        //
    }

    /**
     * Handle the EvaluationRubric "deleted" event.
     *
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return void
     */
    public function deleted(EvaluationRubric $evaluationRubric)
    {
        //
    }

    /**
     * Handle the EvaluationRubric "restored" event.
     *
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return void
     */
    public function restored(EvaluationRubric $evaluationRubric)
    {
        //
    }

    /**
     * Handle the EvaluationRubric "force deleted" event.
     *
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return void
     */
    public function forceDeleted(EvaluationRubric $evaluationRubric)
    {
        //
    }
}
