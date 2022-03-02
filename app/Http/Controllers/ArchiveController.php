<?php

namespace App\Http\Controllers;

# Peticiones
use App\Http\Requests\{
    AddScientificProductionAuthorRequest,
    UpdateAcademicDegreeRequest,
    UpdateAppliantLanguageRequest,
    UpdateHumanCapitalRequest,
    UpdateScientificProductionAuthorRequest,
    UpdateScientificProductionRequest,
    UpdateWorkingExperienceRequest,
    StoreRecommendationLetter,
    UpdateMailRecommendationLetter,
};

# Resources (respuestas en formato JSON)
use Illuminate\Support\Str;
use App\Services\PayUService\Exception;
use App\Http\Resources\AppliantArchive\ArchiveResource;
use App\Mail\SendRecommendationLetter;
//convertir blade a pdf
use Barryvdh\DomPDF\Facade\Pdf;

# Modelos
use App\Models\{
    AcademicArea,
    AcademicDegree,
    AcademicProgram,
    AppliantLanguage,
    Archive,
    ArchiveRequiredDocument,
    Author,
    CustomParameter,
    HumanCapital,
    MyRecommendationLetter,
    Parameter,
    ScientificProduction,
    User,
    WorkingExperience,
    RecommendationLetter,
    RequiredDocument,
    ScoreParameter,
};
use FontLib\Table\Type\os2;
# Clases auxiliares de Laravel.
use Illuminate\Http\{
    JsonResponse,
    Request,
    File
};

use Illuminate\Support\Facades\{
    DB,
    Schema,
    Cache,
    Mail,
    Storage
};
use Nette\Utils\Json;
# Clases de otros paquetes.
use Spatie\QueryBuilder\{
    AllowedFilter,
    QueryBuilder
};

class ArchiveController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the archives dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * 
     */
    public function index(Request $request)
    {
        return view('postulacion.index')
            ->with('user', $request->user())
            ->with('academic_programs', AcademicProgram::with('latestAnnouncement')->get());
    }

    //agregar la carta de recomendacion con la informacion del usuario

    // public function recommendationLetter(Request $request){
    //     return view('postulacion.recommendation-letter')
    //     -> with('user', $request->user())
    //     ;  
    // }

    /**
     * Obtiene los expedientes, vía api.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * 
     */
    public function archives(Request $request)
    {
        $archives = QueryBuilder::for(Archive::class)
            ->with('appliant')
            ->allowedIncludes(['announcement'])
            ->allowedFilters([
                AllowedFilter::exact('announcement.id'),
            ])->get();

        return ArchiveResource::collection($archives);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function postulacion(Request $request, $archiveusr)
    {
        $archiveModel = Archive::where('id', $archiveusr)->first();
        if ($archiveModel == null)
            return 'no existe expediente para este aspirante';

        $archiveModel->loadMissing([
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

        $academic_program = $archiveModel->announcement->academicProgram;
        $appliant = $archiveModel->appliant;



        // dd($archiveModel->recommendationLetter);
        return view('postulacion.show')
            ->with('archive', $archiveModel)
            ->with('appliant', $appliant)
            ->with('academic_program', $academic_program)
            ->with('recommendation_letters', $archiveModel->myRecommendationLetter)
            ->with('archives_recommendation_letters', $archiveModel->recommendationLetter);
    }

        /**
     * Envia la vista de carta de recomendación con los datos requeridos
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //aqui solo recibira una cadena 
    //public function recommendationLetter(Request $request)
    /*
    request tendra

    token
    email evaluator
    answer (boleano numerico)
    */
    public function recommendationLetter(Request $request, $token)
    {

        // #Busqueda de Carta de recomendacion y archivo
        // try {
        //     //Busqueda de carta con token y correo       
        // } catch (\Exception $e) {
        //     return view('postulacion.error-noAppliant')
        //         ->with('user_id', $request->token);
        // }

        //prueba 
        return  view('postulacion.error-lettersSent')
        ->with('user_id', 298428);

        $rl = MyRecommendationLetter::where(
            'token', $token
        );

        // return new JsonResponse(
        //     $rl,
        //     200
        // );

        // Se extrae el archivo de postulacion
        $archive = Archive::where('id', $rl->archive_id)->first();

        #Carga de modelos en archivo
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


        #Verificacion de carta no contestada
        if ($rl->answer >= 1) {
            return view('postulacion.error-lettersSent')
                ->with($archive->appliant->id);
        }

        #Extraccion de variables necesarias
        try {
            // Extrae TODOS LOS PARAMETROS A EVALUAR
            $parameters = Parameter::all();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        // Cartas de recomendacion en expediente
        $num_recommendation_letter_count = $archive->archiveRequiredDocuments()
            ->whereNotNull('location')
            ->whereIsRecommendationLetter()
            ->count();
        $announcement = $archive->announcement;
        $appliant = $archive->appliant;
        $academic_program = $archive->announcement->academicProgram;

        //Enviar los datos necesarios 
        return view('postulacion.recommendation-letter')
            ->with('recommendation_letter', $rl)
            ->with('appliant', $appliant)                   //usuario 
            ->with('announcement', $announcement)
            ->with('parameters', $parameters); //programa academico
    }



    /**
     * Actualiza un documento requerido, para el grado académico
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateMotivation(Request $request)
    {
        Archive::where('id', $request->archive_id)->update(['motivation' => $request->motivation]);

        return new JsonResponse(
            Archive::select('motivation')->firstWhere('id', $request->archive_id)
        );
    }

    /**
     * Actualiza un documento requerido, para el grado académico
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateArchivePersonalDocument(Request $request)
    {
        $archive = Archive::find($request->archive_id);

        # Archivo de la solicitud

        $ruta = $request->file('file')->storeAs(
            'archives/' . $request->archive_id . '/personalDocuments',
            $request->requiredDocumentId . '.pdf'
        );

        # Asocia los documentos requeridos.
        $archive->personalDocuments()->detach($request->requiredDocumentId);
        $archive->personalDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);

        return new JsonResponse(
            $archive->personalDocuments()
                ->select('required_documents.*', 'archive_required_document.location as location')
                ->where('id', $request->requiredDocumentId)
                ->first()
        );
    }

    /**
     * Actualiza un documento requerido, para el grado académico
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateArchiveEntranceDocument(Request $request)
    {
        $archive = Archive::find($request->archive_id);

        # Archivo de la solicitud
        $ruta = $request->file('file')->storeAs(
            'archives/' . $request->archive_id . '/entranceDocuments',
            $request->requiredDocumentId . '.pdf'
        );

        # Asocia los documentos requeridos.
        $archive->entranceDocuments()->detach($request->requiredDocumentId);
        $archive->entranceDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);
        /**Problema al regresar el json, marca un erro en la consulta */
        return new JsonResponse(
            $archive->entranceDocuments()
                ->select('required_documents.*', 'archive_required_document.location as location')
                ->where('id', $request->requiredDocumentId)
                ->first()
        );
    }

    /**
     * Obtiene el grado académico más reciente.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function latestAcademicDegree(Request $request, Archive $archive)
    {
        return new JsonResponse($archive->latestAcademicDegree);
    }

    /**
     * Actualiza los datos académicos del postulante.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateAcademicDegree(UpdateAcademicDegreeRequest $request)
    {
        $academic_degree = AcademicDegree::find($request->id);
        $academic_degree->fill($request->validated());
        $academic_degree->save();

        return new JsonResponse($academic_degree);
    }

    /**
     * Actualiza un documento requerido, para el grado académico
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateAcademicDegreeRequiredDocument(Request $request)
    {
        //FUncion guarda el archivo y actualiza el archivo que se guardo al momento de ver,
        //Pero hasta que subes el archivo por 2 vez aparece el mensaje que se a guardado con exito

        $academic_degree = AcademicDegree::find($request->id);

        # Archivo de la solicitud
        $ruta = $request->file('file')->storeAs(
            'archives/' . $request->archive_id . '/academicDocuments',
            $request->requiredDocumentId . '.pdf'
        );

        # Asocia los documentos requeridos.
        $academic_degree->requiredDocuments()->detach($request->requiredDocumentId);
        $academic_degree->requiredDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);

        return new JsonResponse(
            $academic_degree->requiredDocuments()
                ->select('required_documents.*', 'academic_degree_required_document.location as location')
                ->where('id', $request->requiredDocumentId)
                ->first()
        );
    }

    /**
     * Actualiza un documento requerido, para el grado académico
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateWorkingExperience(UpdateWorkingExperienceRequest $request)
    {
        WorkingExperience::where('id', $request->id)->update($request->safe()->toArray());

        return new JsonResponse(WorkingExperience::find($request->id));
    }

    /**
     * Actualiza un documento requerido, para el grado académico
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateAppliantLanguage(UpdateAppliantLanguageRequest $request)
    {
        AppliantLanguage::where('id', $request->id)->update($request->safe()->toArray());

        return new JsonResponse(AppliantLanguage::find($request->id));
    }


    /**
     * Actualiza la lengua extranjera de un postulante.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateAppliantLanguageRequiredDocument(Request $request)
    {
        $appliant_language = AppliantLanguage::find($request->id);

        # Archivo de la solicitud
        $ruta = $request->file('file')->storeAs(
            'archives/' . $request->archive_id . '/laguageDocuments/',
            $request->id . '_' . $request->requiredDocumentId . '.pdf'
        );

        # Asocia los documentos requeridos.
        $appliant_language->requiredDocuments()->detach($request->requiredDocumentId);
        $appliant_language->requiredDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);

        return new JsonResponse(
            $appliant_language->requiredDocuments()
                ->select('required_documents.*', 'appliant_language_required_document.location as location')
                ->where('id', $request->requiredDocumentId)
                ->first()
        );
    }

    /**
     * Actualiza la lengua extranjera de un postulante.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateScientificProduction(UpdateScientificProductionRequest $request)
    {
        $type = ScientificProduction::where('id', $request->id)->value('type');

        # Determina si el tipo de producción científica cambió
        # y borra la producción científica anterior.
        if ($type !== null && $type !== $request->type && Schema::hasTable($type)) {
            DB::table($type)->where('scientific_production_id', $request->id)->delete();
        }

        $upsert_array = [];
        $identifiers = ['scientific_production_id' => $request->id];

        switch ($request->type) {
            case 'articles':
                $upsert_array = ['magazine_name' => $request->magazine_name];
                break;
            case 'published_chapters':
                $upsert_array = ['article_name' => $request->article_name];
                break;
            case 'technical_reports':
                $upsert_array = ['institution' => $request->institution];
                break;
            case 'working_documents':
                $upsert_array = ['post_title' => $request->post_title];
                break;
            case 'working_memories':
                $upsert_array = ['post_title' => $request->post_title];
                break;
        }

        # Actualiza los datos adicionales de la producción científica.
        if (count($upsert_array) > 0)
            DB::table($request->type)->updateOrInsert($upsert_array, $identifiers);

        # Actualiza los datos generales de la producción científica.
        ScientificProduction::where('id', $request->id)
            ->update($request->safe()->only('state', 'title', 'publish_date', 'type'));

        return new JsonResponse(
            ScientificProduction::leftJoin(
                'articles',
                'articles.scientific_production_id',
                'scientific_productions.id'
            )->leftJoin(
                'published_chapters',
                'published_chapters.scientific_production_id',
                'scientific_productions.id'
            )->leftJoin(
                'technical_reports',
                'technical_reports.scientific_production_id',
                'scientific_productions.id'
            )->leftJoin(
                'working_documents',
                'working_documents.scientific_production_id',
                'scientific_productions.id'
            )->leftJoin(
                'working_memories',
                'working_memories.scientific_production_id',
                'scientific_productions.id'
            )->first()
        );
    }

    /**
     * Agrega un autor a la producción científica.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addScientificProductionAuthor(AddScientificProductionAuthorRequest $request)
    {
        ScientificProduction::where('id', $request->scientific_production_id)->update($request->only('type'));

        return new JsonResponse(Author::create($request->safe()->only('scientific_production_id', 'name')));
    }

    // MyRecommendationLetter $rl, User $appliant, AcademicProgram $academic_program

    public function sentEmailRecommendationLetter(Request $request)
    {

        // Variables locales
        $message = "El correo ya ha sido enviado";
        $change_email = 0;
        $my_token = Str::random(20);

        //validacion de datos
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'academic_program' => ['required'],
            'appliant' => ['required'],
            'letter_created' => ['required'],
            'recommendation_letter' => ['required_if:letter_created,1'] // ya existe carta por lo tanto es requerido
        ]);

        //Se busca el archivo por el USER ID
        $archive = Archive::where('user_id', $request->appliant['id'])->first();
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

        # Cartas de recomendacion en expediente
        $num_recommendation_letter_count = $archive->archiveRequiredDocuments()
            ->whereNotNull('location')
            ->whereIsRecommendationLetter()
            ->count();

        #Se verifica el numero de cartas de recomendacion ya enviadas por archivo de solicitante
        if ($num_recommendation_letter_count > 2) {
            return new JsonResponse('Cartas enviadas, no se permiten mas', 200);
        }

        #Ids para relacion a archive required document table
        $required_document_id  = ($num_recommendation_letter_count < 1) ? 19 : 20; //Maximo de dos cartas, por lo tanto sera solo (0,1)

        //Se verifica si ya existe un registro de Carta o se necesita crear
        if ($request->letter_created == 1) { //ya existe registro de carta

            foreach ($archive->myRecommendationLetter as $rl) {

                #Se verifica que no exista el mismo correo para contestar la carta en otra
                foreach($archive->myRecommendationLetter as $rlCompare){
                    //carta diferente
                    if($rlCompare->id != $rl->id){
                        if(strcmp($rlCompare->email_evaluator,$rl->email_evaluator) == 0){
                            return new JsonResponse('Ya existe ese correo en otra carta, inserte otro porfavor', 200);
                        }
                    }
                }

                //checa si es el mismo id
                if ($rl->id == $request->recommendation_letter['id']) {

                    //Si son  diferentes actualizar registro
                    if (strcmp($rl->email_evaluator, $request->email) != 0) {
                        $change_email = 1; // el email a cambiado
                        $rl->email_evaluator = $request->email;
                        $rl->save();
                        break;
                    }
                }
            }
        } else { //no existe carta

            #SE REQUIERE CREAR CAMPOS EN TABLAS
            try {
                $rl = MyRecommendationLetter::create([
                    'email_evaluator' => $request->email,
                    'archive_id' => $archive->id,
                    'token' => $my_token,  //random token to verify
                    'answer' => 0 //not answer
                ]); //Ahora se espera la respuesta del evaluador

                // Archivo requerido
                $archive_rd = ArchiveRequiredDocument::create([
                    'archive_id' => $archive->id,
                    'required_document_id' => $required_document_id
                ]);

                // Carta de recomendacion (Relacion de carta a archivo requerido)
                $archive_rl = RecommendationLetter::create([
                    'rl_id' => intval($rl->id),
                    'required_document_id' => intval($archive_rd->id),
                ]);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }

       

        #Se envia correo si todo salio correcto
        // if ($request->letter_created == 0 || ($request->letter_created == 1 && $change_email == 1)) {
            
            if ($request->letter_created == 1) { //cambia string ya que existe carta de recomendacion
                $my_token = $request->recommendation_letter['token'];
                 //return json response
            }

         

            try {
                //Email enviado
                Mail::to($request->email)->send(new SendRecommendationLetter($request->email, $request->appliant, $request->academic_program, $my_token));
                $message = 'Se ha enviado el correo';
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        // }

        //return json response
        return new JsonResponse(
            $message,
            200
        );
    }


    /**
     * Actualiza un autor de una producción científica.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateScientificProductionAuthor(UpdateScientificProductionAuthorRequest $request)
    {
        ScientificProduction::where('id', $request->scientific_production_id)->update($request->only('type'));
        Author::where('id', $request->id)
            ->update($request->safe()->only('scientific_production_id', 'name'));

        return new JsonResponse(Author::find($request->id));
    }

    /**
     * Actualiza el capital humano de un postulante.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateHumanCapital(UpdateHumanCapitalRequest $request)
    {
        HumanCapital::where('id', $request->id)->update($request->validated());

        return new JsonResponse(HumanCapital::find($request->id));
    }
}
