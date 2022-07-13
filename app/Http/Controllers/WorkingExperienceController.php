<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWorkingExperienceRequest;
use App\Models\WorkingExperience;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WorkingExperienceController extends Controller
{
    /*---------------------------------------- WORKING EXPERIENCE  ---------------------------------------- */

    public function addWorkingExperience(Request $request)
    {
        $request->validate([
            'archive_id' => ['required', 'numeric'],
            'state' => ['required', 'string', 'max:255']
        ]);

        try {
            $working_experience = WorkingExperience::create([
                'archive_id' => $request->archive_id,
                'state' => $request->state
            ]);
        } catch (\Exception $e) {
            return new JsonResponse('Error al agregar nueva experiencia de trabajo para el aplicante', 502);
        }
        //Recibe la información 
        return new JsonResponse(['message' => 'Experiencia de trabajo agregada, inserta los datos necesarios para continuar con tu postulacion', 'model' => $working_experience], 200);
    }

    public function deleteWorkingExperience(Request $request)
    {
        $request->validate([
            'archive_id' => ['required', 'numeric'],
            'id' => ['required', 'numeric']
        ]);

        try {
            //Find the exact model of academic degree to delete
            $deleted = WorkingExperience::where('id', $request->id,)->where('archive_id', $request->archive_id)->delete();
        } catch (\Exception $e) {
            return new JsonResponse('Error al eliminar experiencia laboral seleccionada', 502);
        }
        //Recibe la información 
        return new JsonResponse(['message' => 'Experiencia laboral eliminada correctamente, podras agregar y rellenar nuevamente los datos si asi lo deseas'], 200);
    }


    public function updateWorkingExperience(UpdateWorkingExperienceRequest $request)
    {
        WorkingExperience::where('id', $request->id)->update($request->safe()->toArray());
        return new JsonResponse(WorkingExperience::find($request->id));
    }

}
