<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmInterviewRequest;
use App\Http\Requests\DeleteInterviewRequest;
use App\Http\Requests\NewInterviewUserRequest;
use App\Http\Requests\RemoveInterviewUserRequest;
use App\Http\Requests\ReopenInterviewRequest;
use App\Http\Requests\StoreInterviewRequest;
use App\Http\Resources\CalendarResource;
use App\Http\Resources\InterviewProgramResource;
use App\Models\AcademicProgram;
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
        $calendar_resource = new CalendarResource(AcademicProgram::withInterviewEagerLoads()->get());

        return view('entrevistas.index')->with($calendar_resource->toArray($request));
    }

    /**
     * Devuelve la vista del programa de entrevistas.
     * 
     * @param Request $request
     */
    public function programa(Request $request)
    {
        $interviews = $request->user()->hasAnyRole(['admin', 'control_escolar']) === false
        ?   $request->user()->interviews()
        :   Interview::select('*');

        $interview_program_resource = new InterviewProgramResource($interviews);

        return view('entrevistas.show', $interview_program_resource->toArray($request));
    }

    /**
     * Agenda una nueva entrevista.
     * 
     * @param Request $request
     */
    public function nuevaEntrevista(StoreInterviewRequest $request)
    {
        $interview_model = Interview::create($request->safe()->except('user_id', 'user_type'));
        $interview_model->users()->attach($request->user_id, ['user_type' => $request->user_type]);
        $interview_model->load('users.roles:name');
        $interview_model->confirmed = false;
        $interview_model->save();

        return new JsonResponse($interview_model, JsonResponse::HTTP_CREATED);
    }

    /**
     * Añade a un profesor a la entrevista.
     * 
     * @param Request $request
     */
    public function newInterviewUser(NewInterviewUserRequest $request)
    {
        # Obtiene el modelo de la entrevista.
        $interview_model = Interview::find($request->safe()->interview_id);
        $interview_model->users()->attach($request->user_id, ['user_type' => $request->user_type]);
        
        # Obtiene al postulante.
        $appliant = $interview_model->appliant->first();
        $archive = $appliant->latestArchive;

        $interview_model->evaluationRubrics()->create([
            'archive_id' => $archive->id,
            'user_id' => $request->user_id,
            'user_type' => $request->user_type
        ]);

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
        $interview_model->evaluationRubrics()
            ->where('user_id', $request->user_id)
            ->where('user_type', $request->user_type)
            ->delete();

        return new JsonResponse(['message'=>'¡Registro a entrevista cancelado exitosamente!'], JsonResponse::HTTP_CREATED);
    }

    /**
     * Confirma una entrevista.
     * 
     * @param Request $request
     */
    public function confirmInterview(ConfirmInterviewRequest $request)
    {
        Interview::where('id', $request->id)->update(['confirmed' => true]);

        return new JsonResponse(['message'=>'Se ha confirmado la entrevista'], JsonResponse::HTTP_OK);
    }

    /**
     * Confirma una entrevista.
     * 
     * @param Request $request
     */
    public function reopenInterview(ReopenInterviewRequest $request)
    {
        Interview::where('id', $request->id)->update(['confirmed' => false]);

        return new JsonResponse(['message'=>'Se ha vuelto a abrir la entrevista'], JsonResponse::HTTP_OK);
    }

    /**
     * Elimina una entrevista.
     * 
     * @param Request $request
     */
    public function deleteInterview(DeleteInterviewRequest $request)
    {
        Interview::where('id', $request->id)->delete();

        return new JsonResponse(['message'=>'Entrevista eliminada exitosamente'], JsonResponse::HTTP_OK);
    }
}