<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EvaluationRubricController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PreRegisterController;
use App\Http\Controllers\ExternalRecommendationLetter;
use App\Http\Controllers\UserController;
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

//Route::get('/',function(){return redirect("/controlescolar");});
##COMENTAR ESTE GRUPO DE RUTAS
Route::prefix('controlescolar')->group(function () {

    # Rutas de autenticacion.
    Route::name('authenticate.')->group(function () {
        # Página principal.
        Route::get('/home', [HomeController::class, 'index'])->name('home')
            ->middleware('auth');

        Route::get('/', [LoginController::class, 'prelogin'])->name('prelogin');

        # Inicio de sesión por OAUTH2.
        Route::get('/login', [LoginController::class, 'login'])->name('login')
            ->middleware('guest');

        // Route::post('/', [LoginController::class, 'LoginPostPreRegister'])->name('login.post.preRegister');
        Route::get('/auth/{id}',[LoginController::class, 'userFromPortal']);

        Route::post('/register', [LoginController::class, 'register'])->name('register')
            ->middleware('guest');
    });

    # Rutas de admin.
    Route::get('prueba/{id}', [LoginController::class, 'testLogin']);

    Route::get('/logout', [Logincontroller::class, 'logout'])->name('logout');

    # Rutas para gestión de usuarios.
    Route::prefix('users')->name('users.')->group(function () {

        # Usuarios del sistema.
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/appliants', [UserController::class, 'appliants'])->name('appliants');
        Route::post('/show', [UserController::class, 'show'])->name('show');

        # Obtener usuario de mi portal.
        Route::post('/miPortalUser', [PreRegisterController::class, 'miPortalUser'])->name('miPortalUser');
    });


    # Rutas para el pre-registro.
    Route::prefix('pre-registro')->name('pre-registro.')->middleware('guest')->group(function () {

        # Obtención de datos
        Route::get('/', [PreRegisterController::class, 'index'])->name('index');
        Route::post('/', [PreRegisterController::class, 'store'])->name('store');
    });

    # Rutas de las solicitudes académicas.
    Route::prefix('solicitud')->name('solicitud.')->middleware(['auth'])->group(function () {

        # Expedientes
        Route::get('/', [ArchiveController::class, 'index'])->middleware(['VerificarPostulante'])->name('index');
        Route::get('/archives', [ArchiveController::class, 'archives'])->name('archives');
        Route::get('/{archive}', [ArchiveController::class, 'postulacion'])->name('show');

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

        # Ver y descargar tipos de archivos.
        Route::get('/archives/{archive}/{type}/{name}', [FileController::class, 'viewDocument'])->name('get');

        #Carta de recomendación {invitado-
        # referente hacia un postulante}
        Route::post('/sentEmailRecommendationLetter', [ArchiveController::class, 'sentEmailRecommendationLetter']);
        // /{recommendation_letter}/{appliant}/{academic_program}
    });

    # Rutas para las entrevistas.
    Route::prefix('entrevistas')->middleware(['auth', 'role:admin|control_escolar|profesor_nb'])->name('entrevistas.')->group(function () {

        # Calendario
        Route::get('calendario', [InterviewController::class, 'calendario'])->name('calendario');

        # Programa de entrevistas
        Route::get('programa', [InterviewController::class, 'programa'])->name('programa');

        # Entrevistas.
        Route::post('nuevaEntrevista', [InterviewController::class, 'nuevaEntrevista'])->name('nuevaEntrevista');
        Route::post('confirmInterview', [InterviewController::class, 'confirmInterview'])->name('confirmInterview');
        Route::post('reopenInterview', [InterviewController::class, 'reopenInterview'])->name('reopenInterview');
        Route::post('deleteInterview', [InterviewController::class, 'deleteInterview'])->name('deleteInterview');

        # Agregar y eliminar a los usuarios de una entrevista.
        Route::post('interviewUser', [InterviewController::class, 'newInterviewUser'])->name('interviewUser');
        Route::delete('interviewUser', [InterviewController::class, 'removeInterviewUser'])->name('interviewUserDelete');

        # Rúbrica de evaluación
        Route::prefix('rubrica')->name('rubrica.')->group(function () {
            Route::get('/{evaluationRubric}', [EvaluationRubricController::class, 'show'])->name('show');
            Route::put('/{evaluationRubric}', [EvaluationRubricController::class, 'update'])->name('update');
            Route::delete('/{evaluationRubric}', [EvaluationRubricController::class, 'destroy'])->name('destroy');
        });

        # Periodods.
        Route::apiResource('periods', PeriodController::class);

        # Api de zoom.
        Route::apiResource('zoom', ZoomController::class);
    });


    # Rutas de admin.
    Route::prefix('admin')->name('admin.')->group(function () {

        # Vista de admin.
        Route::get('/', [AdminController::class, 'index'])
            ->name('index');

        # Profesores
        Route::get('workers', [AdminController::class, 'workers'])
            ->name('workers');

        Route::post('newWorker', [AdminController::class, 'newWorker'])
            ->name('newWorker');
    });


    
    //El usuario no necesita estar autentificado (puede ser cualquier persona con la liga)
    Route::prefix('recommendationLetter')->name('recommendationLetter.')->group(function () {
        # El que recive correo recibe la vista
        
        //el token se almacena en la tabla de carta de recomendacion, esto permitira tener mayor seguridad sin acceder a la tabla de usuarios 
        Route::get('/show/{token}', [ExternalRecommendationLetter::class, 'recommendationLetter'])->name('show');
        // Route::get('/{user_id}', [ArchiveController::class, 'recommendationLetter'])->name('recommendationLetter.show');
        // Route::delete('/recommendationLetter/{id_rl}', [ArchiveController::class, 'deleteRecommendationLetter']) middleware(['auth', 'role:admin|control_escolar']) -> name('recommendationLetter.destroy');

        # Al guardar se hace la peticion para almacenar datos
        Route::post('/addRecommendationLetter', [ExternalRecommendationLetter::class, 'addRecommendationLetter'])->name('store');
    });

    //investigar para control de rutas lo siguiente
    //policies 

    //prueba de registro para comprobar que funciona control escolar
    //convertir despues a log in con auth
    Route::get('pruebaRegistro', [AdminController::class, 'pruebaRegistro']);
});
