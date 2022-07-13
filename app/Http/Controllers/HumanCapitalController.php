<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateHumanCapitalRequest;
use App\Models\HumanCapital;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HumanCapitalController extends Controller
{
        /* -------------------------- CAPITAL HUMANO DEL APLICANTE --------------------------*/
        public function addHumanCapital(Request $request)
        {
            $request->validate([
                'archive_id' => ['required', 'numeric'],
                'state' => ['required', 'string', 'max:255']
            ]);
    
            try {
                $human_capital = HumanCapital::create([
                    'archive_id' => $request->archive_id,
                    'state' => $request->state
                ]);
            } catch (\Exception $e) {
                return new JsonResponse('Error al agregar capital humano para el aplicante', 502);
            }
            //Recibe la información 
            return new JsonResponse(['message' => 'Capital Humano, inserta los datos necesarios para continuar con tu postulacion', 'model' => $human_capital], 200);
        }
    
        public function updateHumanCapital(UpdateHumanCapitalRequest $request)
        {
            HumanCapital::where('id', $request->id)->update($request->validated());
    
            return new JsonResponse(HumanCapital::find($request->id));
        }
    
        public function deleteHumanCapital(Request $request)
        {
    
            $request->validate([
                'archive_id' => ['required', 'numeric'],
                'id' => ['required', 'numeric']
            ]);
    
            try {
                //Find the exact model of academic degree to delete
                $deleted = HumanCapital::where('id', $request->id,)->where('archive_id', $request->archive_id)->delete();
            } catch (\Exception $e) {
                return new JsonResponse(['message' => 'Error eliminar el registro de producción cientifica seleccionado'], 502);
            }
            //Recibe la información 
            return new JsonResponse(['message' => 'Programa academico eliminado correctamente, podras agregar y rellenar nuevamente los datos si asi lo deseas'], 200);
        }
    
}
