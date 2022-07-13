<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddScientificProductionAuthorRequest;
use App\Http\Requests\UpdateScientificProductionAuthorRequest;
use App\Http\Requests\UpdateScientificProductionRequest;
use App\Models\Author;
use App\Models\ScientificProduction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ScientificProductionController extends Controller
{
    /* -------------------------- INVESTIGACIÓN CIENTIFICA DEL APLICANTE --------------------------*/

    public function addScientificProduction(Request $request)
    {
        
        $request->validate([
            'archive_id' => ['required', 'numeric'],
            'state' => ['required', 'string', 'max:255']
        ]);

        try {
            $scientific_production = ScientificProduction::create([
                'archive_id' => $request->archive_id,
                'state' => $request->state
            ]);
        } catch (\Exception $e) {
            return new JsonResponse('Error al agregar produccion cientifica para el aplicante', 502);
        }
        //Recibe la información 
        return new JsonResponse(['message' => 'Produccion cientifica agregada, inserta los datos necesarios para continuar con tu postulacion', 'model' => $scientific_production], 200);
    }

    public function updateScientificProduction(UpdateScientificProductionRequest $request)
    {
        
        # Actualiza los datos generales de la producción científica.
        $scipro = ScientificProduction::where('id', $request->id)
            ->update($request->safe()->only('state', 'title', 'publish_date', 'type'));
        $type = $request->type;

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
                $upsert_array = ['post_title_document' => $request->post_title_document];
                break;
            case 'working_memories':
                $upsert_array = ['post_title_memory' => $request->post_title_memory];
                break;
            case 'reviews_cp':
                $upsert_array = ['post_title_review' => $request->post_title_review];
                break;
        }

        # Actualiza los datos adicionales de la producción científica.
        if (count($upsert_array) > 0)
            DB::table($request->type)->updateOrInsert($identifiers, $upsert_array);


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
            )->leftJoin(
                'reviews_cp',
                'reviews_cp.scientific_production_id',
                'scientific_productions.id'
            )->first()
        );
    }

    public function addScientificProductionAuthor(AddScientificProductionAuthorRequest $request)
    {
        ScientificProduction::where('id', $request->scientific_production_id)->update($request->only('type'));

        return new JsonResponse(Author::create($request->safe()->only('scientific_production_id', 'name')));
    }

    public function deleteScientificProductionAuthor(UpdateScientificProductionAuthorRequest $request)
    {
        try {
            //Find the exact model of academic degree to delete
            $deleted = Author::where('id', $request->id)->where('scientific_production_id', $request->scientific_production_id)->delete();
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error eliminar el registro autor de producción cientifica seleccionado'], 502);
        }
        //Recibe la información 
        return new JsonResponse(['message' => 'Autor eliminado correctamente, podras agregar y rellenar nuevamente los datos si asi lo deseas'], 200);
    }

    public function deleteScientificProduction(Request $request)
    {

        $request->validate([
            'archive_id' => ['required', 'numeric'],
            'id' => ['required', 'numeric']
        ]);

        try {
            //Find the exact model of academic degree to delete
            $deleted = ScientificProduction::where('id', $request->id,)->where('archive_id', $request->archive_id)->delete();
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error eliminar el registro de producción cientifica seleccionado'], 502);
        }
        //Recibe la información 
        return new JsonResponse(['message' => 'Programa academico eliminado correctamente, podras agregar y rellenar nuevamente los datos si asi lo deseas'], 200);
    }

    public function updateScientificProductionAuthor(UpdateScientificProductionAuthorRequest $request)
    {
        ScientificProduction::where('id', $request->scientific_production_id)->update($request->only('type'));
        Author::where('id', $request->id)
            ->update($request->safe()->only('scientific_production_id', 'name'));

        return new JsonResponse(Author::find($request->id));
    }
}
