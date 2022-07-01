<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{

    /**
     * Request -> type (kind of button)
     * Return ->  path to image in public folder
     */
    public function getFlagImage(Request $request)
    {

        $location =  asset('/storage/emojis/alemania.png');
        switch ($request->language) {
            case 'Alemán':
                $location =  asset('/storage/emojis/alemania.png');
                break;
            case 'Español':
                $location =  asset('/storage/emojis/mexico.png');
                break;
            case 'Francés':
                $location =  asset('/storage/emojis/francia.png');
                break;
            case 'Inglés':
                $location =  asset('/storage/emojis/inglaterra.png');
                break;
            default:
            $location = null;
                break;
        }


        return $location;
    }

    /**
     * Request -> type (kind of button)
     * Return ->  path to image in public folder
     */
    public function getButtonImage(Request $request)
    {
        $location =  asset('/storage/archive-buttons/descargar.png');
        switch ($request->type) {
            case 'descargar':
                $location =  asset('/storage/archive-buttons/descargar.png');
                break;
            case 'guardar':
                $location =  asset('/storage/archive-buttons/guardar.png');
                break;
            case 'seleccionar':
                $location =  asset('/storage/archive-buttons/seleccionar.png');
                break;
            case 'ver':
                $location =  asset('/storage/archive-buttons/ver.png');
                break;
            default:
            $location = null;
                break;
        }

        return $location;
    }
}
