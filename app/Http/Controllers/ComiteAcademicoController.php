<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ComiteAcademicoController extends Controller
{
    // public function index(Request $request)
    // {
    //     return new JsonResponse(['user_id',$request->session()->get('user_data')['id']], JsonResponse::HTTP_OK);
    // }

    public function index(Request $request)
    {
        return 'http://ambiental.uaslp.mx:3000/';
    }
}
