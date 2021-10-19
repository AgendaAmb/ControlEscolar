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
    private function miPortalRequest()
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
    public function miPortalGet(string $path, array $query = []): Response
    {
        $request = $this->miPortalRequest()->asForm();
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
     * Consume un get de MiPortal.
     * 
     * @param array $poolRequests
     */
    public function miPortalPool(array $poolRequests): array
    {
        # Añade al arreglo de datos la url absoluta por petición..
        $poolRequests = collect($poolRequests)->map(
            fn($route) => $this->url.$route['url'].'?'.http_build_query($route['query'])
        );
        
        # Devuelve el resultado de las solicitudes.
        return $this->miPortalRequest()->pool(function(Pool $pool) use ($poolRequests){
            $responses = [];

            foreach ($poolRequests as $poolRequest)
                $responses[] = $pool->get($poolRequest);
            

            return $responses;
        });
    }
}