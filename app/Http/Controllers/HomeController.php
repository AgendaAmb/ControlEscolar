<?php

namespace App\Http\Controllers;

use App\Helpers\MiPortalService;
use App\Models\Announcement;
use App\Models\Archive;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Json;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {
        // dd($request->session()->get('user')->academicComittes[0]->name);
        // dd($request->session()->get('user')->roles[0]->name);
        // dd($request->session()->get('user')->roles[0]->name);

        return view('home')
        ->with('user', $request->session()->get('user_data'))
        ->with('user_roles',$request->session()->get('user')->roles);
    }

    public function pruebaexcel()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }
   
}
