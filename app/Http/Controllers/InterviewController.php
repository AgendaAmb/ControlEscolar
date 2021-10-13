<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterviewController extends Controller
{
    /**
     * Devuelve la vista del.
     * 
     * @param Request $request
     */
    public function calendario()
    {
        return view('entrevistas.index');
    }
}