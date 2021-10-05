<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::view('/', 'pre-registro.index')->name('programasAcademicos');

# Rutas de las solicitudes académicas.
Route::prefix('solicitud')->name('solicitud.')->group(function(){

    Route::get('/{academicProgram}', [ArchiveController::class,'postulacion'])->name('postulacion'); 

    # Actualiza la solicitud del aspirante
    Route::post('/guardaDocumentoPersonal', [ArchiveController::class, 'guardaDocumentoPersonal'])->name('guardaDocumentoRequerido'); 

    # Actualiza los datos académicos del postulante.
    Route::post('/updateAcademicDegree', [ArchiveController::class, 'updateAcademicDegree']);
});

# Rutas para las cartas de intención.
Route::prefix('cartaIntencion')->name('cartaIntencion.')->group(function(){

    Route::get('{academicProgram}', [ArchiveController::class,'subirCartaIntencion'])->name('subirCartaIntencion'); 

    # Actualiza la solicitud del aspirante
    Route::post('/', [ArchiveController::class, 'otorgaCartaIntencion'])->name('otorgaCartaIntencion'); 
});

# Rutas para las cartas de recomendación.
Route::prefix('cartaRecomendacion')->name('cartaRecomendacion.')->group(function(){

    Route::get('{academicProgram}', [ArchiveController::class,'subirCartaRecomendacion'])->name('subirCartaRecomendacion'); 

    # Actualiza la solicitud del aspirante
    Route::post('/', [ArchiveController::class, 'otorgaCartaRecomendacion'])->name('otorgaCartaRecomendacion'); 
});


Route::view('/entrevistas', 'entrevistas.index')->name('entrevistas.index');