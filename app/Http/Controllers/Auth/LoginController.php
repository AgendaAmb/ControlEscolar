<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\LoginService;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * El controlador consume al proovedor de servicios de Mi Portal.
     *
     * @var \App\Helpers\LoginService
     */
    private $loginService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->loginService = new LoginService;
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request)
    {
        # Determina si se requiere solicitar autorización.
        if (!$this->loginService->isCallbackRequest($request))
            return $this->loginService->requestAuthorization($request);

        # Busca al usuario en el sistema central.
        $user_response = $this->loginService->loginGet('api/users/whoami', $request->code);

        # Si la respuesta fue errónea, devuele el error.
        if ($user_response->failed())
            return back()->withErrors($user_response->collect());

        # Recolecta los datos del usuario.
        $miportal_user = $user_response->collect();

        # Busca al usuario en el sistema.
        $user = User::where('id', $miportal_user['id'])->where('type', $miportal_user['user_type'])->first();

        # Si el usuario no está en el sistema, manda error.
        if ($user === null)
            return back()->withErrors(['motivo' => 'Usuario no registrado en el sistema']);

        # Autentica al usuario y guarda los datos del sistema central.
        Auth::login($user);
        $request->session()->put('user', $miportal_user);
        

        # Redirecciona a la página principal.
        return redirect()->route('entrevistas.calendario');
    }
}
