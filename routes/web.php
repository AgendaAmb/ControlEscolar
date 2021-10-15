<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PreRegisterController;
use App\Http\Controllers\UserController;
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

# Rutas para inicio de sesión.
Route::name('authenticate.')->group(function(){

    # Usuarios del sistema.
    Route::get('/', [LoginController::class, 'login'])->name('login');
});


# Rutas para gestión de usuarios.
Route::prefix('users')->name('users.')->group(function(){

    # Usuarios del sistema.
    Route::get('/', [UserController::class, 'index'])->name('index');
   
    # Obtener usuario de mi portal.
    Route::post('/miPortalUser', [PreRegisterController::class, 'miPortalUser'])->name('miPortalUser');
});

# Rutas para el pre-registro.
Route::prefix('pre-registro')->name('pre-registro.')->group(function(){
    
    # Obtención de datos
    Route::get('/', [PreRegisterController::class, 'index'])->name('index');
    Route::post('/', [PreRegisterController::class, 'store'])->name('store');
});

# Rutas de las solicitudes académicas.
Route::prefix('solicitud')->name('solicitud.')->group(function(){

    # Expedientes
    Route::get('/', [ArchiveController::class,'index'])->name('index');
    Route::get('/archives', [ArchiveController::class,'archives'])->name('archives');
    Route::get('/{archive}', [ArchiveController::class,'postulacion'])->name('show'); 

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
Route::prefix('entrevistas')->middleware('auth')->name('entrevistas.')->group(function(){

    # Calendario
    Route::get('calendario', [InterviewController::class, 'calendario'])->name('calendario');

    # Periodods.
    Route::apiResource('periods', PeriodController::class);

    # Api de zoom.
    Route::apiResource('zoom', ZoomController::class);
});