<?php

namespace App\Http\Controllers;


use App\Http\Requests\ConfirmInterviewRequest;
use App\Http\Requests\DeleteInterviewRequest;
use App\Http\Requests\NewInterviewUserRequest;
use App\Http\Requests\RemoveInterviewUserRequest;
use App\Http\Requests\ReopenInterviewRequest;
use App\Http\Requests\StoreInterviewRequest;
use App\Http\Resources\CalendarResource;
use App\Http\Resources\InterviewProgram\InterviewProgramResource;
use App\Models\AcademicProgram;
use App\Models\Interview;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMeeatingInformation;
use App\Mail\SendMeeatingInformationProfesor;

class InterviewController extends Controller
{
    public $alumno;
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
     * Sets the available announcements.
     *
     * @return void
     */
    private function setInterviewAcademicAreas(&$interview)
    {
        # Llena el modelo con 5 áreas académicas vacías.
        $empty_areas = array_fill(0, 5, [
            'name' => 'Área académica disponible',
            'professor_name' => false
        ]);

        # Asigna de forma inicial, ningún área académica.
        unset($interview->academicAreas);
        $interview->academic_areas = $empty_areas;
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
        $interview_model->load(['users.roles:name', 'appliant']);
        $interview_model->confirmed = false;
        $interview_model->save();

        # Obtiene los datos del profesor que otorgó la carta de intención, con 
        # base a la información de mi portal.
        $professor = $interview_model->intentionLetterProfessor->first();
        $miPortal_worker = collect($request->session()->get('workers'))->firstWhere('id', $professor->id);
        $professor_name = implode(' ', [$miPortal_worker['name'], $miPortal_worker['middlename'], $miPortal_worker['surname']]);

        # Obtiene los datos del postulante, con base a la información de mi portal.
        $miPortal_user = collect($request->session()->get('appliants'))->firstWhere('id', $request->user_id);
        $name = implode(' ', [$miPortal_user['name'], $miPortal_user['middlename'], $miPortal_user['surname']]);

        # Devuelve en la respuesta, los datos de los usuarios.
        $appliant = $interview_model->appliant->first()->toArray();
        $appliant['name'] = $name;

        # Sobreescribe con información nueva.
        unset($interview_model->appliant);
        unset($interview_model->intentionLetterProfessor);
        $interview_model->appliant = $appliant;
        $interview_model->intention_letter_professor = [
            'id' => $miPortal_worker['id'],
            'type' => $miPortal_worker['user_type'],
            'name' => $professor_name
        ];

        # Establece las áreas académicas de la entrevista.
        $this->setInterviewAcademicAreas($interview_model);

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

        return new JsonResponse(['message' => '¡Registro a entrevista cancelado exitosamente!'], JsonResponse::HTTP_CREATED);
    }

    /**
     * Confirma una entrevista.
     * 
     * @param Request $request
     */
    public function confirmInterview(ConfirmInterviewRequest $request)
    {
       
      
        $interview2 = Interview::findorFail($request->id);
        
        foreach ($interview2->evaluationRubrics as $rubric) {
          
            $rubric->getAverageScoreBasicConcepts();
            $rubric->getAverageScoreAcademicConcepts();
            $rubric->getAverageScoreResearchConcepts();
            $rubric->getAverageWorkingExperienceConcepts();
            $rubric->getAverageWorkingPersonalAttributesConcepts();
   
        }

        /**Checar si el url es null por si se reabrio el interview */
        if ($interview2->url == null) {
            //Crear url para la sesion de zoom//
            $ResponseMeating = app(ZoomController::class)->store($interview2);
            //Interview::where('id', $request->id)->update(['confirmed' => true, 'url' => $ResponseMeating['join_url']]);

            //AQUI SE DEBE DE ENVIAR UN CORREO A TODOS LOS PROFESORES PARTICIPANTES EN ESTA ENTREVISTA
            //dd($ResponseMeating['id']);
            /**Traer a los trabajadores del arreglo de sesiones alumno*/
            $Trabajadores = $request->session()->get('workers');
           
            foreach ($interview2->users as $key => $User) {

                if ($User->user_type == "externs" || $User->user_type == "students") {
                    $this->alumno=$User;
                   Mail::to("A260651@alumnos.uaslp.mx")->send(new SendMeeatingInformation($ResponseMeating, $User, $request->room));
                    //Mail::to($User->email)->send(new SendMeeatingInformation($ResponseMeating,$User,$request->room));
                } else if ($User->user_type == "workers") {
                    /**Obtener al trabajador inscrito en la entrevista */
                    $Trabajador = $Trabajadores->where('id', $User->id)->first();

                   // $User::findorFail($User->id);
 
                    Mail::to("A260651@alumnos.uaslp.mx")->send(new SendMeeatingInformationProfesor($ResponseMeating,$Trabajador,$request->room,$this->alumno));
                    //Mail::to($Trabajador['email'])->send(new SendMeeatingInformation($ResponseMeating,$Trabajador,$request->room,$User));
                }
            }
        }


        return new JsonResponse(['message' => 'Se ha confirmado la entrevista'], JsonResponse::HTTP_OK);
    }

    /**
     * Confirma una entrevista.
     * 
     * @param Request $request
     */
    public function reopenInterview(ReopenInterviewRequest $request)
    {
        Interview::where('id', $request->id)->update(['confirmed' => false]);

        return new JsonResponse(['message' => 'Se ha vuelto a abrir la entrevista'], JsonResponse::HTTP_OK);
    }

    /**
     * Elimina una entrevista.
     * 
     * @param Request $request
     */
    public function deleteInterview(DeleteInterviewRequest $request)
    {
        Interview::where('id', $request->id)->delete();

        return new JsonResponse(['message' => 'Entrevista eliminada exitosamente'], JsonResponse::HTTP_OK);
    }
}
