<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class VerificarPostulante
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //return $request;
        //dd(Auth::user());
        $puedePasar = false;
        foreach(Auth::user()->roles as $r){
            if($r->id == 8 || $r->id == 7 || $r->id == 6 || $r->id == 5 || $r->id == 4){
                $puedePasar = true;
                break;
            }
        }

        if(!$puedePasar)
            return redirect('controlescolar/solicitud/' . Auth::user()->id);
        else
            return $next($request);
    }
}
