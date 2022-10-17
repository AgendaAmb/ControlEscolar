<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysqli;

class OldDocumentController extends Controller
{
    public function listOldDocumentsIMAREC(Request $request)
    {
        $min = 5;
        $max = 10;
        $documents = DB::table('archivos')->where('mimetype','!=','application/pdf')->whereBetween('IdSolicitud', [$min, $max])->get(['idSolicitud','Datos', 'IdTipoArchivo', 'mimetype']);

        return $documents;
    }
    public function listOldDocuments(Request $request)
    {
        $documents = DB::table('documento')->get(['ClaveDocumento','Nombre']);
        // $documents=DB::table('documento')->where('ClaveDocumento', 1)->get(['ClaveDocumento','Nombre']);
        return $documents;
    }


    public function viewOldDocumentIMAREC($idSolicitud,$IdTipoArchivo,$nameDatabase)
    {
        $res = null;
        if(strcmp($nameDatabase, 'IMAREC') == 0){
            // $res = DB::table('archivos')->where(['idSolicitud','=',$idSolicitud],['IdTipoArchivo','=',$IdTipoArchivo])->get(['idSolicitud','Datos', 'IdTipoArchivo', 'mimetype']);
            $res = DB::select('select * from archivos where idSolicitud='.$idSolicitud.' and IdTipoArchivo='.$IdTipoArchivo);
        }

        return $res[0];
    }

    public function viewOldDocument($idDocumento, $nameDatabase)
    {

        $res = null;
         if (strcmp($nameDatabase, 'OLD_CONTROL_ESCOLAR') == 0 ){
            $res = DB::select('select * from documento where ClaveDocumento='.$idDocumento);
        }
     
        return $res[0];
    }
}
