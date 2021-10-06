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

    # Actualiza diferentes datos de la solicitud de un postulante.
    Route::post('/updateMotivation', [ArchiveController::class, 'updateMotivation']); 
    Route::post('/updateArchivePersonalDocument', [ArchiveController::class, 'updateArchivePersonalDocument']); 
    Route::post('/updateArchiveEntranceDocument', [ArchiveController::class, 'updateArchiveEntranceDocument']); 
    Route::post('/updateAcademicDegree', [ArchiveController::class, 'updateAcademicDegree']);
    Route::post('/updateAcademicDegreeRequiredDocument', [ArchiveController::class, 'updateAcademicDegreeRequiredDocument']);
    Route::post('/updateWorkingExperience', [ArchiveController::class, 'updateWorkingExperience']);
    Route::post('/updateAppliantLanguage', [ArchiveController::class, 'updateAppliantLanguage']);
    Route::post('/updateAppliantLanguageRequiredDocument', [ArchiveController::class, 'updateAppliantLanguageRequiredDocument']);
    Route::post('/updateScientificProduction', [ArchiveController::class, 'updateScientificProduction']);
});


/*

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

*/
Route::view('/entrevistas', 'entrevistas.index')->name('entrevistas.index');