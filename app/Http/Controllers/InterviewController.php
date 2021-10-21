<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInterviewRequest;
use App\Models\Archive;
use App\Models\EvaluationRubric;
use App\Models\Interview;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    /**
     * Devuelve la vista del calendario.
     * 
     * @param Request $request
     */
    public function calendario(Request $request)
    {
        return view('entrevistas.index')->with('user', $request->session()->get('user'));
    }

    /**
     * Devuelve la vista de la rúbrica.
     * 
     * @param Request $request
     */
    public function rubrica(Request $request, EvaluationRubric $evaluationRubric)
    {
        $evaluationRubric->load([
            'archive',
            'basicConcepts',
            'academicConcepts',
            'researchConcepts',
            'workingExperienceConcepts',
            'personalAttributesConcepts'
        ]);

        return view('entrevistas.rubrica')
            ->with('user', $request->session()->get('user'))
            ->with('rubric', $evaluationRubric);
    }

    /**
     * Devuelve la vista del.
     * 
     * @param Request $request
     */
    public function nuevaEntrevista(StoreInterviewRequest $request)
    {
        $interview_model = Interview::create($request->safe()->except('user_id', 'user_type'));
        $interview_model->users()->attach($request->user_id, ['user_type' => $request->user_type]);

        return new JsonResponse($interview_model, JsonResponse::HTTP_CREATED);
    }
}