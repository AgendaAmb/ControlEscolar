<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddScientificProductionAuthorRequest;
use App\Http\Requests\UpdateAcademicDegreeRequest;
use App\Http\Requests\UpdateAppliantLanguageRequest;
use App\Http\Requests\UpdateHumanCapitalRequest;
use App\Http\Requests\UpdateScientificProductionAuthorRequest;
use App\Http\Requests\UpdateScientificProductionRequest;
use App\Http\Requests\UpdateWorkingExperienceRequest;
use App\Models\AcademicDegree;
use App\Models\AppliantLanguage;
use App\Models\Archive;
use App\Models\Author;
use App\Models\HumanCapital;
use App\Models\ScientificProduction;
use App\Models\WorkingExperience;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ArchiveController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function postulacion(Request $request, $archive)
    {
        $archiveModel = Archive::with(['entranceDocuments' => function($query){

            return $query->where('intention_letter', false)->where('recommendation_letter', false);
        }])->firstWhere('id',  $archive);

        $academic_program = $archiveModel->academicProgram;

        return view('postulacion.show')
        ->with('archive', $archiveModel)
        ->with('academic_program', $academic_program);
    }

    /**
     * Actualiza un documento requerido, para el grado académico
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateMotivation(Request $request)
    {
        Archive::where('id', $request->archive_id)->update(['motivation'=>$request->motivation]);

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
            'archives/'.$request->archive_id.'/personalDocuments', 
            $request->requiredDocumentId.'.pdf'
        );

        # Asocia los documentos requeridos.
        $archive->personalDocuments()->detach($request->requiredDocumentId);
        $archive->personalDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);

        return new JsonResponse(
            $archive->personalDocuments()
            ->select('required_documents.*','archive_required_document.location as location')
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
            'archives/'.$request->archive_id.'/entranceDocuments', 
            $request->requiredDocumentId.'.pdf'
        );

        # Asocia los documentos requeridos.
        $archive->entranceDocuments()->detach($request->requiredDocumentId);
        $archive->entranceDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);

        return new JsonResponse(
            $archive->entranceDocuments()
            ->select('required_documents.*','archive_required_document.location as location')
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
        $academic_degree = AcademicDegree::find($request->id);

        # Archivo de la solicitud
        $ruta = $request->file('file')->storeAs(
            'archives/'.$request->archive_id.'/academicDocuments', 
            $request->requiredDocumentId.'.pdf'
        );

        # Asocia los documentos requeridos.
        $academic_degree->requiredDocuments()->detach($request->requiredDocumentId);
        $academic_degree->requiredDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);

        return new JsonResponse(
            $academic_degree->requiredDocuments()
            ->select('required_documents.*','academic_degree_required_document.location as location')
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
            'archives/'.$request->archive_id.'/appliantLanguage/'.$request->id, 
            $request->requiredDocumentId.'.pdf'
        );

        # Asocia los documentos requeridos.
        $appliant_language->requiredDocuments()->detach($request->requiredDocumentId);
        $appliant_language->requiredDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);

        return new JsonResponse(
            $appliant_language->requiredDocuments()
            ->select('required_documents.*','appliant_language_required_document.location as location')
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
        if ($type!== null && $type !== $request->type && Schema::hasTable($type))
        {
            DB::table($type)->where('scientific_production_id', $request->id)->delete();
        }
        
        $upsert_array = [];
        $identifiers = ['scientific_production_id' => $request->id];

        switch ($request->type)
        {
            case 'articles': $upsert_array = ['magazine_name' => $request->magazine_name]; break;
            case 'published_chapters': $upsert_array = ['article_name' => $request->article_name]; break;
            case 'technical_reports': $upsert_array = ['institution' => $request->institution]; break;
            case 'working_documents': $upsert_array = ['post_title' => $request->post_title]; break;
            case 'working_memories': $upsert_array = ['post_title' => $request->post_title]; break;
        }

        # Actualiza los datos adicionales de la producción científica.
        if (count($upsert_array) > 0)
            DB::table($request->type)->updateOrInsert($upsert_array, $identifiers);

        # Actualiza los datos generales de la producción científica.
        ScientificProduction::where('id', $request->id)
            ->update($request->safe()->only('state','title','publish_date', 'type'));
        
        return new JsonResponse(
            ScientificProduction::leftJoin(
                'articles', 'articles.scientific_production_id', 'scientific_productions.id'
            )->leftJoin(
                'published_chapters', 'published_chapters.scientific_production_id', 'scientific_productions.id'
            )->leftJoin(
                'technical_reports', 'technical_reports.scientific_production_id', 'scientific_productions.id'
            )->leftJoin(
                'working_documents', 'working_documents.scientific_production_id', 'scientific_productions.id'
            )->leftJoin(
                'working_memories', 'working_memories.scientific_production_id', 'scientific_productions.id'
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