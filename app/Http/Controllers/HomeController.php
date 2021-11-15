<?php

namespace App\Http\Controllers;

use App\Models\AcademicProgram;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {
        return view('home');
    }
}
