<?php

namespace App\Helpers;

use Exception;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class OldSchoolControlService
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
     * Constructor
     */
    public function __construct()
    {
        $this->url = env('OSC_URL', null);
        $this->client_id = env('OSC_CLIENT_ID', -1);
        $this->client_secret = env('OSC_CLIENT_SECRET', null);

        throw_if($this->url === null, Exception::class, 'El url del api no está especificado en el .env');
        throw_if($this->client_id === -1, Exception::class, 'El id del cliente de Mi Portal no está especificado en el .env');
        throw_if($this->client_secret === null, Exception::class, 'El token oauth2 de Mi Portal no está especificado en el .env');
    }

    /**
     * Requests an oauth client token
     *
     * @return string
     */
    private function requestClientToken()
    {
        # Solicita el token bearer
        $token_response = Http::post($this->url.'oauth/token', [
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
    private function getRequest()
    {
        $token = $this->requestClientToken();
        return Http::withToken($token)->withHeaders(['content-type' => 'application/json', 'accept' => 'application/json']);
    }

    /**
     * Consume un get de MiPortal.
     * 
     * @param string $path
     * @param array $query
     */
    public function get(string $path, array $query = []): Response
    {
        $request = $this->getRequest()->asForm();
        return $request->get($this->url. $path, $query);
    }

    /**
     * Consume un post de MiPortal.
     * 
     * @param string $path
     * @param array $query
     */
    public function post(string $path, array $body = []): Response
    {
        $request = $this->getRequest();
        return $request->post($this->url. $path, $body);
    }
}