<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArchiveFileRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Visualiza un expediente.
     */
    public function viewDocument(ArchiveFileRequest $request, $archive, $type, $name)
    {
        try 
        {
            # Crea la ruta al archivo.
            $userPath = implode('/', [$archive,$type,$name]);

            # Obtiene el archivo.
            $filepath = Storage::path('archives/'.$userPath);

            # Devuelve el archivo.
            return response()->file($filepath);
        }
        catch (Exception $e) 
        {
            return abort(502, 'Archivo no encontrado');
        }
    }

    public function viewDocument_extern( $archive_id, $personal_documents, $entrance_documents, $academic_documents, $language_documents, $working_documents,$archive, $type, $name)
    {
        try 
        {
            # Crea la ruta al archivo.
            $userPath = implode('/', [$archive,$type,$name]);

            # Obtiene el archivo.
            $filepath = Storage::path('archives/'.$userPath);

            # Devuelve el archivo.
            return response()->file($filepath);
        }
        catch (Exception $e) 
        {
            return abort(502, 'Archivo no encontrado');
        }
    }

    /**
     * Visualiza un expediente.
     */
    public function downloadDocument($archive, $type, $name)
    {
        try 
        {
            # Crea la ruta al archivo.
            $userPath = implode('/', [$archive,$type,$name]);

            # Obtiene el archivo.
            $filepath = Storage::path('archives/'.$userPath);

            # Devuelve el archivo.
            return response()->download($filepath);
        }
        catch (Exception $e) 
        {
            return abort(502, 'Archivo no encontrado');
        }
    }

    public function downloadLetterCommitment(Request $request, $folderParent, $folderType, $namefile)
    {
        try 
        {
            # Crea la ruta al archivo.
            $filePath = implode('/', [$folderParent,$folderType,$namefile]);

            # Obtiene el archivo.
            $locationFile = Storage::path('public/'.$filePath);

            # Devuelve el archivo para descargar directamente.
            return response()->download($locationFile);
        }
        catch (Exception $e) 
        {
            return abort(502, 'Archivo no encontrado');
        }
    }

}