<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComiteAcademicoController extends Controller
{
    // public function index(Request $request)
    // {
    //     return new JsonResponse(['user_id',$request->session()->get('user_data')['id']], JsonResponse::HTTP_OK);
    // }
        protected static $user;

    public function index(Request $request)
    {
        return 'http://ambiental.uaslp.mx:3000/';
    }

}
