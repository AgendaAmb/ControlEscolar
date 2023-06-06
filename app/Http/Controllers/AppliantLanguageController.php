<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAppliantLanguageRequest;
use App\Models\AppliantLanguage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AppliantLanguageController extends Controller
{
       /* -------------------------- LANGUAGUES OF APPLIANT --------------------------*/

       public function addAppliantLanguage(Request $request)
       {
           $request->validate([
               'archive_id' => ['required', 'numeric'],
               'state' => ['required', 'string', 'max:255']
           ]);

           
           try {
               $appliant_language = AppliantLanguage::create([
                   'archive_id' => $request->archive_id,
                   'state' => $request->state
               ]);
               $appliant_language->loadMissing([
                   'requiredDocuments'
               ]);
           } catch (\Exception $e) {
               return new JsonResponse('Error al agregar nuevo idioma para el aplicante', 502);
           }
           //Recibe la información 
           return new JsonResponse(['message' => 'Idioma agregado, inserta los datos necesarios para continuar con tu postulacion', 'model' => $appliant_language], 200);
       }
   
   
       public function deleteAppliantLanguage(Request $request)
       {
           $request->validate([
               'archive_id' => ['required', 'numeric'],
               'id' => ['required', 'numeric']
           ]);
   
           try {
               //Find the exact model of academic degree to delete
               $deleted = AppliantLanguage::where('id', $request->id,)->where('archive_id', $request->archive_id)->delete();
           } catch (\Exception $e) {
               return new JsonResponse('Error al eliminar idioma seleccionado', 502);
           }
           //Recibe la información 
           return new JsonResponse(['message' => 'Idioma eliminado correctamente, podras agregar y rellenar nuevamente los datos si asi lo deseas'], 200);
       }
   
       public function updateAppliantLanguage(UpdateAppliantLanguageRequest $request)
       {
        
           AppliantLanguage::where('id', $request->id)->update($request->safe()->toArray());
   
           return new JsonResponse(AppliantLanguage::find($request->id));
       }
   
       public function updateAppliantLanguageRequiredDocument(Request $request)
       {
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
       
           $appliant_language = AppliantLanguage::find($request->id);
       
           # Archivo de la solicitud
           $ruta = $request->file('file')->storeAs(
               'archives/' . $request->archive_id . '/laguageDocuments',
               $request->id . '_' . $request->requiredDocumentId . '-' . $request->index . '.pdf'
           );
       
           # Buscar y eliminar el documento anterior si existe
           $previousDocument = $appliant_language->requiredDocuments()
               ->where('id', $request->requiredDocumentId)
               ->first();
       
           if ($previousDocument) {
               Storage::delete($previousDocument->location);
               $previousDocument->delete();
       
               // Imprimir mensaje de eliminación del documento anterior y su nombre
               $previousDocumentName = $previousDocument->nombre; // Reemplaza 'nombre' con el campo correcto
               error_log("Se eliminó el documento anterior: " . $previousDocumentName);
           }
       
           # Crear una nueva asociación con el nuevo documento
           $appliant_language->requiredDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);
       
           // Imprimir mensaje de subida del nuevo documento y su nombre
           $newDocumentName = $request->file('file')->getClientOriginalName();
           error_log("Se subió el nuevo documento: " . $newDocumentName);
       
           return new JsonResponse(
               $appliant_language->requiredDocuments()
                   ->select('required_documents.*', 'appliant_language_required_document.location as location')
                   ->where('id', $request->requiredDocumentId)
                   ->first()
           );
       }
       
}
