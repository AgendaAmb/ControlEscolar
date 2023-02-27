<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAcademicDegreeRequest;
use App\Models\AcademicDegree;
use App\Models\Archive;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AcademicDegreeController extends Controller
{

    
    
        /*---------------------------------------- ACADEMIC DEGREE  ---------------------------------------- */
        public function latestAcademicDegree(Request $request, Archive $archive)
        {
            return new JsonResponse($archive->latestAcademicDegree);
        }
    
        public function updateAcademicDegree(UpdateAcademicDegreeRequest $request)
        {
    
            try {
                $academic_degree = AcademicDegree::find($request->id);
                $academic_degree->update($request->safe()->toArray());
                $academic_degree->save();
            } catch (\Exception $e) {
                return new JsonResponse(['message' => 'Error al actualizar información'], 500);
            }
    
            return new JsonResponse(['message' => $academic_degree], 200);
        }
    
    
        public function addAcademicDegree(Request $request)
        {
            try {
                $request->validate([
                    'archive_id' => ['required', 'numeric'],
                    'state' => ['required', 'string', 'max:255']
                ]);
            } catch (\Exception $e) {
                return new JsonResponse(['message' => 'Datos erroneos'], 502);
            }
    
            try {
                $academic_degree = AcademicDegree::create([
                    'archive_id' => $request->archive_id,
                    'state' => $request->state
                ]);
    
                $academic_degree->loadMissing([
                    'requiredDocuments'
                ]);
    
                $academic_degree->save();
            } catch (\Exception $e) {
                return new JsonResponse(['message' => 'Error al crear registro academico para el usuario'], 502);
            }
            //Recibe la información 
            return new JsonResponse(['message' => 'Programa académico agregado, inserta los datos necesarios para continuar con tu postulación', 'model' => $academic_degree], 200);
        }
    
        public function deleteAcademicDegree(Request $request)
        {
    
            $request->validate([
                'archive_id' => ['required', 'numeric'],
                'id' => ['required', 'numeric']
            ]);
    
            try {
                //Find the exact model of academic degree to delete
                $deleted = AcademicDegree::where('id', $request->id,)->where('archive_id', $request->archive_id)->delete();
            } catch (\Exception $e) {
                return new JsonResponse('Error eliminar el registro de datos academicos seleccionado', 502);
            }
            //Recibe la información 
            return new JsonResponse(['message' => 'Programa academico eliminado correctamente, podras agregar y rellenar nuevamente los datos si asi lo deseas'], 200);
        }
    
    
        public function updateAcademicDegreeRequiredDocument(Request $request)
        {
            //FUncion guarda el archivo y actualiza el archivo que se guardo al momento de ver,
            //Pero hasta que subes el archivo por 2 vez aparece el mensaje que se a guardado con exito
            try {
                $request->validate([
                    'index' => ['required', 'numeric'],
                    'id' => ['required', 'numeric'],
                    'archive_id' => ['required', 'numeric'],
                    'requiredDocumentId' => ['required', 'numeric'],
                    'file' => ['required']
                ]);
            } catch (\Exception $e) {
                return new JsonResponse('Error de validacion', 502);
            }
    
            $academic_degree = AcademicDegree::find($request->id);
    
            # Archivo de la solicitud
            $ruta = $request->file('file')->storeAs(
                'archives/' . $request->archive_id . '/academicDocuments',
                $request->requiredDocumentId . '-' . $request->index . '.pdf'
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
}
