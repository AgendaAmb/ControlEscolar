<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeriodRequest;
use App\Models\Period;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class PeriodController extends Controller
{
    /**
     * Devuelve los periodos de entrevistas
     */
    public function index(): JsonResponse
    {
        $period = Period::latest()->first();

        return new JsonResponse($period, JsonResponse::HTTP_OK); 
    }

    /**
     * Crea un nuevo periodo de entrevistas.
     */
    public function store(StorePeriodRequest $request)
    {
        $period = Period::create($request->safe()->except('num_salas'));
        $period->rooms()->createMany(array_fill(0, $request->num_salas, []));
        $period->load(['rooms','interviews.users']);

        return new JsonResponse($period, JsonResponse::HTTP_CREATED); 
    }
}