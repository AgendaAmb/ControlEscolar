<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComiteAcademicoController extends Controller
{

    public function index(Request $request)
    {
        try{
            $id = $request->session()->get('user_data')['id'];
            $comite = DB::select('CALL isComiteAcademico(?)', array($id));
            if($comite[0]->name == null){
                throw new \Exception('No se encontró en el comité académico');
            }
        }
        catch(Exception $e){
            return redirect()->route('authenticate.home')->with('error', $e->getMessage());
        }
        
    }

}
