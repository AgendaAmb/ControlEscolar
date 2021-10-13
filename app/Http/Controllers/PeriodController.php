<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class PeriodController extends Controller
{
    /**
     * Devuelve los periodos de entrevistas
     */
    public function index(): JsonResponse
    {
        $periods = Period::where('end_date', '<', Carbon::now())->get();

        return new JsonResponse($periods, JsonResponse::HTTP_OK); 
    }
}