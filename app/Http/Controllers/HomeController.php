<?php

namespace App\Http\Controllers;

use App\Helpers\MiPortalService;
use App\Models\Archive;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Json;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {
        // dd($request->session()->get('user_data'));
        return view('home',[ 
            'user' => $request->session()->get('user_data')
        ]);
    }
}
