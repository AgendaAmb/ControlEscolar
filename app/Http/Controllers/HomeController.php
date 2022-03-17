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
        $s = new MiPortalService;
        try{
            $usr = $s->miPortalGet('api/usuarios',['filter[id]' => Auth::user()->id])->collect();
            $data = $request->session()->all();
        }catch (\Exception $e) {
            return '<h1>Usuario invalido</h1>';
        }
        
        // dd($data);

        return view('home',[ 
            'user' => $usr[0],
            // 'archive' => $archive
        ]);
    }
}
