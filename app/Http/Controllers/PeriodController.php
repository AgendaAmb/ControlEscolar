<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeriodRequest;
use App\Models\interview_period_has_announcement;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class PeriodController extends Controller
{
    /**
     * Crea un nuevo periodo de entrevistas.
     */
    public function store(StorePeriodRequest $request)
    {
        # Datos para el periodo de entrevista|
        $data = $request->safe()->except('num_salas', 'announcements');
        $data['finished'] = false;

        $period = Period::create($data);

        // * Creacion de las salas
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

        // * Creación de relaciones con announcements
        foreach ($request->announcements as $announcement) {
            $period->announcements_relations()->create([
                'interview_period_id' => $period->id,
                'announcement_id' => $announcement,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        return new JsonResponse(['url' => route('entrevistas.calendario')]);
    }
}
