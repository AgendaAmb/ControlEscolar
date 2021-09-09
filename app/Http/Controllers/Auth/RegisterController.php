<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\MiPortalService;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        # Nuevo usuario del sistema.
        $user = $this->create($request->all());

        # Envía un evento, para registrar al usuario en el sistema.
        event(new Registered($user));
        
        # Devuelve una respuesta de éxito.
        return new JsonResponse([], 201);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return mixed
     */
    protected function create(array $data)
    {
        try 
        {
            # Registra al usuario.
            $registered_user = MiPortalService::registerNewUserService($data);

            $user = User::create([
                'id' => $registered_user['id'],
                'type' => $registered_user['user_id']
            ]);

            return $user;
        } 

        # El usuario no fue registrado
        catch (ValidationException $e) 
        {
            $errors = [
                'EmailR' => $e->errors()['email'] ?? null,
                'Nombres' => $e->errors()['Nombres'] ?? null,
                'Genero' => $e->errors()['Genero'] ?? null,
                'ApellidoP' => $e->errors()['ApellidoP'] ?? null,
                'ApellidoM' => $e->errors()['ApellidoM'] ?? null,
                'Password' => $e->errors()['password'] ?? null,
                'PasswordR' => $e->errors()['passwordR'] ?? null,
                'PaisNacimiento' => $e->errors()['Pais'] ?? null,
                'Tel' => $e->errors()['Tel'] ?? null,
                'Curp' => $e->errors()['CURP'] ?? null,
                'Edad' => $e->errors()['Edad'] ?? null,
                'PaisResidencia' => $e->errors()['LugarResidencia'] ?? null
            ];

            $errors = array_filter($errors, fn($val) => $val !== null);
            throw ValidationException::withMessages($errors); 
        }
    }
}