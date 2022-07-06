<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Http\Request;
use App\Models\EvaluationRubric;
use App\Models\Archive;
use App\Http\Resources\RubricAverageResource;
use Illuminate\Http\JsonResponse;


class RubricExport implements FromView
{

    public $request;
    public $id;

    public function __construct(Request $request, $id)
    {
        $this->request = $request;
        $this->id = $id; 
    }

    public function view(): View
    {
        // Toma la primera rúbrica de la entrevista
        $evaluationRubric = EvaluationRubric::where('archive_id', $this->id)->first();
        $grade = Archive::find($this->id)->announcement->academicProgram->type;
        
        if (!isset($evaluationRubric)) {
            return "No existe rúbrica para mostrar";
        }

        // Obtiene las rubricas asociadas a un postulante mediante archive_id 
        $evaluation_rubrics = EvaluationRubric::where('archive_id', $evaluationRubric->archive_id)->get();

        // Average scores per rubric concept
        $avg_score = [
            'num_rubrics' => 0,
            'basic'     => 0.0,
            'academic'  => 0.0,
            'research'  => 0.0,
            'exp'       => 0.0,
            'personal'  => 0.0,
            'rubric_total' => 0.0,
        ];

        $avg_collection = [];
        $score = 0.0;

        // Para cada una de las rubricas se calcula el promedio por sección
        foreach ($evaluation_rubrics as $ev) {
            $avg_score['num_rubrics'] += 1;
            $avg_score['basic'] = $ev->getAverageScoreBasicConcepts($grade);
            $avg_score['academic'] = $ev->getAverageScoreAcademicConcepts($grade);
            $avg_score['research'] = $ev->getAverageScoreResearchConcepts($grade);
            $avg_score['exp'] = $ev->getAverageWorkingExperienceConcepts($grade);
            $avg_score['personal'] = $ev->getAverageWorkingPersonalAttributesConcepts($grade);
            // Suma del total
            $avg_score['rubric_total'] = $avg_score['basic'] + $avg_score['academic'] + $avg_score['research'] + $avg_score['exp'] + $avg_score['personal'];
            $score += $avg_score['rubric_total'];
            array_push($avg_collection, $avg_score);
        }

        // Se obtienen los datos de cada rubrica
        $rubrics_collection = RubricAverageResource::collection($evaluation_rubrics);

        //! Temporal - obtener los datos basicos del postulante
        $archiveModel = Archive::where('id', $evaluation_rubrics[0]->archive_id)->first();
        if ($archiveModel === null) {
            return new JsonResponse(['message' => 'No se pudo extraer informacion del archivo'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }
        try {
            $archiveModel->loadMissing([
                'academicDegrees.requiredDocuments',
                'appliantLanguages.requiredDocuments',
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se pudo extraer informacion del archivo'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        $data = [
            "rubrics" => [],
            "appliant" => $rubrics_collection[0]->toArray($this->request)['appliant'],
            "data" => $archiveModel,
            "avg_collection" => $avg_collection,
            "type" => $grade
        ];

        foreach ($rubrics_collection as $rc) {
            array_push($data['rubrics'], $rc->toArray($this->request)['rubric']);
        }

        return view('excel.archive_rubric', [
            'data' => $data,
            'score' => round($score / count($evaluation_rubrics), 2)
        ]);
    }
}
