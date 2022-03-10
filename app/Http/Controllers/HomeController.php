<?php

namespace App\Http\Controllers;

use App\Helpers\MiPortalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $s = new MiPortalService;
        $usr = $s->miPortalGet('api/usuarios',['filter[id]' => Auth::user()->id])->collect();

        return view('home',[ 'user' => $usr[0] ]);
    }
}
