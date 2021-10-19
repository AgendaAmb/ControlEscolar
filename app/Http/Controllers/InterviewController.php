<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInterviewRequest;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    /**
     * Devuelve la vista del.
     * 
     * @param Request $request
     */
    public function calendario(Request $request)
    {
        return view('entrevistas.index')->with('user', $request->session()->get('user'));
    }

    /**
     * Devuelve la vista del.
     * 
     * @param Request $request
     */
    public function nuevaEntrevista(StoreInterviewRequest $request)
    {
        dd($request->safe());
    }
}