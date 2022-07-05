<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;
use stdClass;

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

    public function getAllButtonImage()
    {
        $images = new stdClass;
        $images->descargar =    asset('/storage/archive-buttons/descargar.png');
        $images->guardar =      asset('/storage/archive-buttons/guardar.png');
        $images->seleccionar =  asset('/storage/archive-buttons/seleccionar.png');
        $images->ver =          asset('/storage/archive-buttons/ver.png');
        return $images;
    }

    public function getImageAcademicProgram(Request $request)
    {
        $location =  asset('/storage/academic-programs/doctorado-01.png');
        switch ($request->academic_program) {
            case 'Doctorado en ciencias ambientales':
                $location =  asset('/storage/academic-programs/doctorado-01.png');
                break;
            case 'Maestría Interdisciplinaria en ciudades sostenibles':
                $location =  asset('/storage/academic-programs/imarec-01.png');
                break;
            case 'Maestría en ciencias ambientales, doble titulación':
                $location =  asset('/storage/academic-programs/maestria-internacional-01.png');
                break;
            case 'Maestría en ciencias ambientales':
                $location =  asset('/storage/academic-programs/maestria-nacional-01.png');
                break;
            default:
                $location = asset('/storage/academic-programs/doctorado-01.png');
                break;
        }

        // dd($request->academic_program);

        return $location;
    }
}
