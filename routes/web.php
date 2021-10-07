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