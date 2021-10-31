<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeriodRequest;
use App\Models\Period;
use Illuminate\Http\RedirectResponse;

class PeriodController extends Controller
{
    /**
     * Crea un nuevo periodo de entrevistas.
     */
    public function store(StorePeriodRequest $request)
    {
        $period = Period::create($request->safe()->except('num_salas'));
        $period->rooms()->createMany(array_fill(0, $request->num_salas, []));

        return new RedirectResponse(route('entrevistas.calendario'));
    }
}