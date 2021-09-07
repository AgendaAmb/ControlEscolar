<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\MiPortalService;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;


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


        dd(1);
        /*
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());*/
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return mixed
     */
    protected function create(array $data)
    {
        # Determina si el usuario fue registrado con éxito.
        $res = MiPortalService::registerNewUserService($data);

        if ($res === false)
            dd('falló');

        dd('todo cool');
    }

    /**
     * Creates the user model.
     *
     * @param  array  $new_user_data
     * @return array
     */
    /*
    private function createUser(array $new_user_data)
    {
        # Tipo de usuario, en base al DA
        switch ($new_user_data['DirectorioActivo'])
        {
            case 'ALUMNOS':

                $id = $new_user_data['ClaveUASLP'];
                unset($new_user_data['DirectorioActivo']);
                unset($new_user_data['ClaveUASLP']);
                $user = Student::updateOrCreate([ 'id' => $id ],  $new_user_data);
                $guard = 'students';

                break;

            case 'UASLP':

                $id = $new_user_data['ClaveUASLP'];
                unset($new_user_data['DirectorioActivo']);
                unset($new_user_data['ClaveUASLP']);
                $user = Worker::updateOrCreate([ 'id' => $id ],  $new_user_data);
                $guard = 'workers';

                if ($new_user_data['email'] === 'eugenia.almendarez@uaslp.mx')
                    $user->assignRole('administrator');
                else if ($new_user_data['email'] === 'laura.rodriguez@uaslp.mx')
                    $user->assignRole('coordinator');
                break;

            default:

                # El usuario externo no pertenece a ninguna facultad
                unset($new_user_data['dependency']);
                unset($new_user_data['DirectorioActivo']);
                unset($new_user_data['ClaveUASLP']);
                unset($new_user_data['CorreoAlterno']);
                $user = Extern::create($new_user_data);
                $guard = 'web';

                break;
        }

        return [ $user, $guard ];
    }*/
}