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
use App\Models\Archive;
use App\Models\Room;
use Carbon\Carbon;
//Presencial
use App\Mail\SendMeeatingInformation;
use App\Mail\SendMeeatingInformationProfesor;
//Zoom
use App\Mail\SendZoomMeeatingInformation;
use App\Mail\SendZoomMeeatingInformationProfesor;

use App\Helpers\MiPortalService;

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
        //return $request;
        $calendar_resource = new CalendarResource(AcademicProgram::WithInterviewEagerLoads()->get());

        // return AcademicProgram::WithInterviewEagerLoads()->get();
        // return $calendar_resource;

        return view('entrevistas.index')->with($calendar_resource->toArray($request));
    }

    public function calendario1(Request $request)
    {
        //return $request;
        $calendar_resource = new CalendarResource(AcademicProgram::WithInterviewEagerLoads()->get());

        return AcademicProgram::WithInterviewEagerLoads()->get();
        // return $calendar_resource;

        // return view('entrevistas.index')->with($calendar_resource->toArray($request));
    }

    public function calendario2(Request $request)
    {

        // $service = new MiPortalService;
        // $user_data_collect =  $service->miPortalGet('api/usuarios', ['filter[id]' => 291395])->collect();

        // return $user_data_collect;

        //return $request;
        $calendar_resource = new CalendarResource(AcademicProgram::WithInterviewEagerLoads()->get());

        // return AcademicProgram::WithInterviewEagerLoads()->get();
        return $calendar_resource;

        // return view('entrevistas.index')->with($calendar_resource->toArray($request));
    }

    public function calendario3(Request $request)
    {

        $service = new MiPortalService;
        $user_data_collect =  $service->miPortalGet('api/usuarios', ['filter[id]' => 291395])->collect();

        return $user_data_collect;
    }


    /**
     * Devuelve la vista del programa de entrevistas.
     * 
     * @param Request $request
     */

    public function programa(Request $request)
    {
        // Administracion
        // Control escolar - Ver todo
        // Comite academico - Ver promedios
        // Cordinador - Ver todo / no modificar / ver promedio
        // Profesor nucleo basico
        // Aspirante 

        $interviews = $request->user()->hasAnyRole(['admin', 'control_escolar', 'comite_academico', 'coordinador']) === true
            ?   Interview::select('*')->where('confirmed', 1)
            :   $request->user()->interviews()->where('confirmed', 1);

        $interview_program_resource = new InterviewProgramResource($interviews);

        // return $interview_program_resource->toArray($request);

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
        $int_room = Room::findorFail($interview2->room_id);

        // foreach ($interview2->evaluationRubrics as $rubric) {

        //     $rubric->getAverageScoreBasicConcepts();
        //     $rubric->getAverageScoreAcademicConcepts();
        //     $rubric->getAverageScoreResearchConcepts();
        //     $rubric->getAverageWorkingExperienceConcepts();
        //     $rubric->getAverageWorkingPersonalAttributesConcepts();

        // }
        try{
        /**Checar si el url es null por si se reabrio el interview */
        if ($interview2->url == null) {

            //Crear url para la sesion de zoom//
            $ResponseMeating = app(ZoomController::class)->store($interview2);

            // Entrevista presencial o virtual
            if(str_contains($int_room->site,'Zoom')?true:false){
                //Crear url para la sesion de zoom//
                $ResponseMeating = app(ZoomController::class)->store($interview2);
            }else{
                $ResponseMeating = null;
            }

            // TODO AQUI SE DEBE DE ENVIAR UN CORREO A TODOS LOS PROFESORES PARTICIPANTES EN ESTA ENTREVISTA
            //dd($ResponseMeating['id']);

            /**Traer a los trabajadores del arreglo de sesiones alumno*/
            $Trabajadores = $request->session()->get('workers');

            // Carga el achivo del postulante para obtener el programa academico
            $archive = null;

            foreach ($interview2->users as $key => $User) {
                if ($User->user_type == "externs" || $User->user_type == "students") {
                    $this->alumno = $User;

                    $archive = Archive::where('user_id', $this->alumno->id)->first();

                    //Carga programa academico
                    $archive->loadMissing([
                        'announcement.academicProgram',
                        'appliant',
                    ]);

                   $academic_program =  $archive->announcement->academicProgram;
                }
            }

            foreach ($interview2->users as $key => $User) {

                if ($academic_program != null) {
                    $servicio_correo = 'smtp';
                    // IMAREC
                    if (strcmp($academic_program['alias'], 'imarec') === 0) {
                        $servicio_correo = 'smtp_imarec';
                    } else {
                        // MCA, MCA doble titulacion, Doctorado
                        $servicio_correo = 'smtp_pmpca';
                    }

                    if ($User->user_type == "externs" || $User->user_type == "students") {
                        $this->alumno = $User;
                        // Envio de correo dependidiendo modalidad de la entrevista
                        if(str_contains($int_room->site,'Zoom')?true:false){
                            if ($archive->announcement->academicProgram->alias === 'imarec')
                                Mail::mailer('smtp_imarec')->to("A291395@alumnos.uaslp.mx")->send(new SendZoomMeeatingInformation($ResponseMeating, $User, $archive->announcement->academicProgram, $request->room, $archive->id));
                            else
                                Mail::mailer('smtp_pmpca')->to("A291395@alumnos.uaslp.mx")->send(new SendZoomMeeatingInformation($ResponseMeating, $User, $archive->announcement->academicProgram, $request->room, $archive->id));
                            // Mail::mailer($servicio_correo)->to($User->email)->send(new SendZoomMeeatingInformation($ResponseMeating, $User, $archive->announcement->academicProgram['name'], $request->room, $archive->id));
                        }else{
                            if ($archive->announcement->academicProgram->alias === 'imarec')
                                Mail::mailer('smtp_imarec')->to("A291395@alumnos.uaslp.mx")->send(new SendMeeatingInformation($interview2, $User, $archive->announcement->academicProgram, $request->room, $archive->id));
                            else
                                Mail::mailer('smtp_imarec')->to("A291395@alumnos.uaslp.mx")->send(new SendMeeatingInformation($interview2, $User, $archive->announcement->academicProgram, $request->room, $archive->id));
                            // Mail::mailer($servicio_correo)->to($User->email)->send(new SendMeeatingInformation($interview2, $User, $archive->announcement->academicProgram['name'], $request->room, $archive->id));
                        }
                    } else if ($User->user_type == "workers") {
                        /**Obtener al trabajador inscrito en la entrevista */
                        $Trabajador = $Trabajadores->where('id', $User->id)->first();
                        // Envio de correo dependidiendo modalidad de la entrevista
                        if(str_contains($int_room->site,'Zoom')?true:false){
                            // Filtrar envio de correos por programa academico
                            if($archive->announcement->academicProgram->alias === 'imarec')
                                // $Trabajador['email']
                                Mail::mailer('smtp_imarec')->to("A291395@alumnos.uaslp.mx")->send(new SendZoomMeeatingInformationProfesor($ResponseMeating, $Trabajador, $archive->announcement->academicProgram,  $request->room, $this->alumno));
                            else
                                Mail::mailer('smtp_pmpca')->to("A291395@alumnos.uaslp.mx")->send(new SendZoomMeeatingInformationProfesor($ResponseMeating, $Trabajador, $archive->announcement->academicProgram,  $request->room, $this->alumno));
                            // Mail::mailer($servicio_correo)->to($Trabajador['email'])->send(new SendZoomMeeatingInformationProfesor($ResponseMeating, $Trabajador, $archive->announcement->academicProgram['name'],  $request->room, $this->alumno));
                        }else{
                            // Filtrar envio de correos por programa academico
                            if ($archive->announcement->academicProgram->alias === 'imarec')
                                Mail::mailer('smtp_imarec')->to("A291395@alumnos.uaslp.mx")->send(new SendMeeatingInformationProfesor($interview2, $Trabajador, $archive->announcement->academicProgram,  $request->room, $this->alumno));
                            else
                                Mail::mailer('smtp_pmpca')->to("A291395@alumnos.uaslp.mx")->send(new SendMeeatingInformationProfesor($interview2, $Trabajador, $archive->announcement->academicProgram,  $request->room, $this->alumno));
                            // Mail::mailer($servicio_correo)->to($Trabajador['email'])->send(new SendMeeatingInformationProfesor($interview2, $Trabajador, $archive->announcement->academicProgram['name'],  $request->room, $this->alumno));    
                        }
                    }
                }
            }
        }
            // Actualizacion bandera - entrevista cerrada
            Interview::where('id', $request->id)->update(['confirmed' => true, 'url' => $ResponseMeating['join_url']]);
        }catch(\Exception $e){
            return new JsonResponse(['message' => 'Error al enviar correos de entrevista'], JsonResponse::HTTP_OK);
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

    // Documents for interview

    public function documentsForInterviewShow(Request $request, $archive_id)
    {
        // $request->validate([
        //     'archive_id' => ['required', 'numeric', 'exists:archives,id'],
        // ]);


        try {
            $archive = Archive::where('id', intval($archive_id))->first();
            //Carga modelos de archivo
            $archive->loadMissing([
                'appliant',
                'announcement.academicProgram',
                'personalDocuments',
                'recommendationLetter',
                'myRecommendationLetter',
                'entranceDocuments',
                'intentionLetter',
                'academicDegrees.requiredDocuments',
                'appliantLanguages.requiredDocuments',
                'appliantWorkingExperiences',
                'scientificProductions.authors',
                'humanCapitals'
            ]);
            $academic_program = $archive->announcement->academicProgram;
            $appliant = $archive->appliant;
            $img = 'PMPCA-SUPERIOR.png';

            if ($academic_program->name === 'Maestría en ciencias ambientales') {
                $img = 'PMPCA-SUPERIOR.png';
            } else if ($academic_program->name === 'Maestría en ciencias ambientales, doble titulación') {
                $img = 'ENREM-SUPERIOR.png';
            } else if ($academic_program->name === 'Maestría Interdisciplinaria en ciudades sostenibles') {
                $img = 'IMAREC-SUPERIOR.png';
            }

            $header_academic_program =          asset('storage/headers/' . $img);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se pudo extraer la informacion del expediente'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        return view('entrevistas.showUpdateDocuments')
        ->with('archive', $archive)
        ->with('appliant', $appliant)
        ->with('academic_program', $academic_program)
        ->with('header_academic_program', $header_academic_program);
    }
}
