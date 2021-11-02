<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewInterviewUserRequest;
use App\Http\Requests\RemoveInterviewUserRequest;
use App\Http\Requests\StoreInterviewRequest;
use App\Http\Resources\CalendarResource;
use App\Models\AcademicProgram;
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
        $calendar_resource = new CalendarResource(AcademicProgram::all());

        return view('entrevistas.index')->with($calendar_resource->toArray($request));
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
        $interview_model->load('users.roles:name');

        return new JsonResponse($interview_model, JsonResponse::HTTP_CREATED);
    }

    /**
     * Añade a un profesor a la entrevista.
     * 
     * @param Request $request
     */
    public function newInterviewUser(NewInterviewUserRequest $request)
    {
        $interview_model = Interview::find($request->safe()->interview_id);
        $appliant = $interview_model->appliant->first();
        $archive = $appliant->latestArchive;
     
        $interview_model->users()->attach($request->user_id, ['user_type' => $request->user_type]);
        $archive->evaluationRubrics()->create($request->safe()->except('interview_id'));

        return new JsonResponse($request->user()->academicAreas->first(), JsonResponse::HTTP_CREATED);
    }

    /**
     * Añade a un profesor a la entrevista.
     * 
     * @param Request $request
     */
    public function removeInterviewUser(RemoveInterviewUserRequest $request)
    {
        # Registra al profesor a la entrevista.
        $interview_model = Interview::find($request->safe()->interview_id);
        $interview_model->users()->detach($request->user_id);

        # Obtiene al postulante.
        $appliant = $interview_model->appliant->first();
        $archive = $appliant->latestArchive;
        $archive->evaluationRubrics()
            ->where('user_id', $request->user_id)
            ->where('user_type', $request->user_type)
            ->delete();

        return new JsonResponse(['message'=>'¡Registro a entrevista cancelado exitosamente!'], JsonResponse::HTTP_CREATED);
    }
}