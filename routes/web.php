<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterviewController;
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

    Route::get('/{archive}', [ArchiveController::class,'postulacion'])->name('postulacion'); 

    # Requisitos de ingreso.
    Route::post('/updateMotivation', [ArchiveController::class, 'updateMotivation']); 
    Route::post('/updateArchivePersonalDocument', [ArchiveController::class, 'updateArchivePersonalDocument']); 
    Route::post('/updateArchiveEntranceDocument', [ArchiveController::class, 'updateArchiveEntranceDocument']); 
    
    # Grados académicos.
    Route::get('/{archive}/latestAcademicDegree', [ArchiveController::class, 'latestAcademicDegree']);
    Route::post('/updateAcademicDegree', [ArchiveController::class, 'updateAcademicDegree']);
    Route::post('/updateAcademicDegreeRequiredDocument', [ArchiveController::class, 'updateAcademicDegreeRequiredDocument']);
    
    # Experiencia laboral.
    Route::post('/updateWorkingExperience', [ArchiveController::class, 'updateWorkingExperience']);

    # Lenguas extranjeras del postulante.
    Route::post('/updateAppliantLanguage', [ArchiveController::class, 'updateAppliantLanguage']);
    Route::post('/updateAppliantLanguageRequiredDocument', [ArchiveController::class, 'updateAppliantLanguageRequiredDocument']);

    # Producciones científicas.
    Route::post('/updateScientificProduction', [ArchiveController::class, 'updateScientificProduction']);
    Route::post('/addScientificProductionAuthor', [ArchiveController::class, 'addScientificProductionAuthor']);
    Route::post('/updateScientificProductionAuthor', [ArchiveController::class, 'updateScientificProductionAuthor']);

    # Capital humano.
    Route::post('/updateHumanCapital', [ArchiveController::class, 'updateHumanCapital']);
});


# Rutas para las entrevistas.
Route::apiResource('interviews', InterviewController::class);
