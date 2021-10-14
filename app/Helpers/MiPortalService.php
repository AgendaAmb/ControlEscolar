<?php

namespace App\Helpers;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class MiPortalService
{
    /*
    |--------------------------------------------------------------------------
    | Mi Portal Service
    |--------------------------------------------------------------------------
    |
    | Consume los servicios de la aplicación de "Mi portal".
    |
    */

    /**
     * Url del api
     * 
     * @var string
     */
    private $url;

    /**
     * Id asignado al sistema
     * 
     * @var integer
     */
    private $module_id;

    /**
     * Id oauth2
     * 
     * @var integer
     */
    private $client_id;

    /**
     * Llave oauth2
     * 
     * @var string
     */
    private $client_secret;

    /**
     * Url de redirección
     * 
     * @var string
     */
    private $redirect_uri;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->url = env('MIPORTAL_API_URL', null);
        $this->module_id = env('MIPORTAL_MODULE_ID', -1);
        $this->client_id = env('MIPORTAL_CLIENT_ID', -1);
        $this->client_secret = env('MIPORTAL_CLIENT_SECRET', null);
        $this->redirect_uri = env('MIPORTAL_REDIRECT_URL', null);

        throw_if($this->url === null, Exception::class, 'El url del api no está especificado en el .env');
        throw_if($this->module_id === null, Exception::class, 'El id del módulo de Mi Portal no está especificado en el .env');
        throw_if($this->client_id === null, Exception::class, 'El id del cliente de Mi Portal no está especificado en el .env');
        throw_if($this->client_secret === null, Exception::class, 'El token oauth2 de Mi Portal no está especificado en el .env');
        throw_if($this->redirect_uri === null, Exception::class, 'La uri de redireccionamiento de Mi Portal no está en el .env');
    }

    /**
     * Creates an oauth2 redirect uri.
     *
     * @param string $code
     *
     * @return string|bool
     */
    public function requestAuthorization(Request $request)
    {
        # Guarda una llave aleatoria y el id de usuario.
        $request->session()->put('state', $state = Str::random(40));

        # Genera el url de autorización.
        $query = http_build_query([
            'client_id' => $this->client_id,
            'redirect_uri' => $this->redirect_uri,
            'response_type' => 'code',
            'scope' => '',
            'state' => $state,
        ]);

        # URL para autorizar la solicitud.
        $url = $this->url.'oauth/authorize?'.$query;

        return redirect($url);
    }

    /**
     * Validate authorization.
     *
     * @param Request $request
     *
     * @return bool
     */
    public function validateAuthorization(Request $request)
    {
        # Valida el estado de la sesión.
        $state = $request->session()->pull('state');

        if (strlen($state) > 0 && $state === $request->state)
            return true;

        return false;
    }

    /**
     * Generates an oauth2 client token.
     *
     * @return string
     */
    public function requestAuthorizationCodeToken($code)
    {
        # Solicita el token bearer
        $token_response = Http::asForm()->post($this->url.'oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'redirect_uri' => $this->redirect_uri,
            'code' => $code,
        ]);

        # Arroja error, en caso de que el token no sea válido.
        throw_if($token_response->failed(), ValidationException::withMessages($token_response->collect()->toArray()));

        # Devuelve el token.
        return $token_response->collect()['access_token'];
    }


    /**
     * Requests an oauth client token
     *
     * @return string
     */
    private function requestClientToken()
    {
        # Solicita el token bearer
        $token_response = Http::asForm()->post($this->url.'oauth/token', [
            'grant_type' => 'client_credentials',
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
        ]);

        # Arroja error, en caso de que el token no sea válido.
        throw_if($token_response->failed(), ValidationException::withMessages($token_response->collect()->toArray()));

        # Devuelve el token.
        return $token_response->collect()['access_token'];
    }

    /**
     * Generates a new Request.
     */
    private function miPortalRequest()
    {
        $token = $this->requestClientToken();
        return Http::withToken($token)->withHeaders(['content-type' => 'application/json', 'accept' => 'application/json']);
    }

    /**
     * Generates a new Oauth2 Request.
     */
    private function miPortalOauth2Request($code)
    {
        $token = $this->requestAuthorizationCodeToken($code);
        return Http::withToken($token)->withHeaders(['content-type' => 'application/json', 'accept' => 'application/json']);
    }

    /**
     * Consume un get de MiPortal.
     * 
     * @param string $path
     * @param array $query
     */
    public function miPortalGet(string $path, array $query = []): Response
    {
        $request = $this->miPortalRequest();
        return $request->get($this->url. $path, $query);
    }
    
    /**
     * Consume un get de tipo Oauth2 de MiPortal.
     * 
     * @param string $path
     * @param string $code
     * @param array $query
     */
    public function miPortalOauth2Get(string $path, string $code, array $query = []): Response
    {
        $request = $this->miPortalOauth2Request($code);
        return $request->get($this->url. $path, $query);
    }

    /**
     * Consume un post de MiPortal.
     * 
     * @param string $path
     * @param array $query
     */
    public function miPortalPost(string $path, array $body = []): Response
    {
        $request = $this->miPortalRequest();
        return $request->post($this->url. $path, $body);
    }

    /**
     * Consume un post de MiPortal.
     * 
     * @param string $path
     * @param array $query
     */
    public function miPortalOauth2Post(string $path, string $code, array $body = []): Response
    {
        $request = $this->miPortalOauth2Request($code);
        return $request->post($this->url . $path, $body);
    }
}