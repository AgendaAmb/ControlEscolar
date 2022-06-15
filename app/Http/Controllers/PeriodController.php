<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeriodRequest;
use App\Models\Period;
use Illuminate\Http\JsonResponse;

class PeriodController extends Controller
{
    /**
     * Crea un nuevo periodo de entrevistas.
     */
    public function store(StorePeriodRequest $request)
    {
        # Datos para el periodo de entrevista
        $data = $request->safe()->except('num_salas');
        $data['finished'] = false;

        $period = Period::create($data);

        if ($data['modality'] === 'presencial' || $data['modality'] === 'mixta') {
            // Presencial rooms
            $period->rooms()->create(['site' => 'Aula']);   //  aula
            $period->rooms()->create(['site' => 'Sala de videoconferencias']);    //  sala de videoconferencias
            $period->rooms()->create(['site' => 'Sala de usos multiples']);    //  sala de usos multiples
        }

        if ($data['modality'] === 'virtual' || $data['modality'] === 'mixta') {
            $site = "Zoom - Sala ";
            // Virtual rooms
            for ($i = 0; $i < 3; $i++) {
                $period->rooms()->create(['site' => $site . ($i + 1)]);
            }
        }

        return new JsonResponse(['url' => route('entrevistas.calendario')]);
    }
}
