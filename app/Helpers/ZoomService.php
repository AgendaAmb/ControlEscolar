<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Http;

class ZoomService
{
    /*
    |--------------------------------------------------------------------------
    | Zoom Service
    |--------------------------------------------------------------------------
    |
    | Consume los servicios de la aplicación de "ZOOM".
    |
    */

    /**
     * URL del api
     */
    private const URL = 'https://api.zoom.us/v2/';

    /**
     * Crea un nuevo token de zoom
     */
    private function zoomToken()
    {
        $key = env('ZOOM_API_KEY', '');
        $secret = env('ZOOM_API_SECRET', '');

        // note : exp tiene que ser igual al de zoom
        $payload = [
            'iss' => $key,
            'exp' => strtotime('+90 minute'),
        ];

        return JWT::encode($payload, $secret, 'HS256');
    }
    

    // method for get ZOOM_API_URL environment variable.
    private function retrieveZoomUrl()
    {
        return env('ZOOM_API_URL', '');
    }

    /**
     * Crea una nueva solicitud
     */
    private function zoomRequest()
    {
        $jwt = $this->zoomToken();
        return Http::withHeaders([
            'authorization' => 'Bearer ' . $jwt,
            'content-type' => 'application/json',
        ]);
    }

    /**
     * Consume un get de zoom.
     * 
     * @param string $path
     * @param array $query
     */
    public function zoomGet(string $path, array $query = [])
    {
        $request = $this->zoomRequest();
        return $request->get(self::URL . $path, $query);
    }

    /**
     * Consume un post de zoom.
     * 
     * @param string $path
     * @param array $query
     */
    public function zoomPost(string $path, array $body = [])
    {
        $request = $this->zoomRequest();
        return $request->post(self::URL . $path, $body);
    }

    /**
     * Consume un patch de zoom.
     * 
     * @param string $path
     * @param array $query
     */
    public function zoomPatch(string $path, array $body = [])
    {
        $request = $this->zoomRequest();
        return $request->patch(self::URL . $path, $body);
    }

    /**
     * Consume un delete de zoom.
     * 
     * @param string $path
     * @param array $query
     */
    public function zoomDelete(string $path, array $body = [])
    {
        $request = $this->zoomRequest();
        return $request->delete(self::URL . $path, $body);
    }
}
