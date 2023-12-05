<?php

use App\Http\Controllers\AcademicDegreeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppliantLanguageController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ArchiveEnremController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ComiteAcademicoController;
use App\Http\Controllers\EvaluationRubricController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PreRegisterController;
use App\Http\Controllers\ExternalRecommendationLetter;
use App\Http\Controllers\HumanCapitalController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OldDocumentController;
use App\Http\Controllers\ScientificProductionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkingExperienceController;
use App\Models\HumanCapital;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


#$BASE_ROUTE = env('BASE_PATH');

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
#Comentar linea de abajo
//Route::get('/',function(){return redirect("/controlescolar");});





Route::get('/', [LoginController::class, 'prelogin'])->name('authenticate.prelogin');
Route::redirect('controlescolar', 'pre-registro'); //esto soluciona el error 403 (no se porque exactamente XD)
Route::get('/downloadLetterCommitment/{folderParent}/{folderType}/{namefile}', [FileController::class, 'downloadLetterCommitment'])->name('letterCommitment')->middleware(['auth']);


//Comentar linea de abajo para produccion

//Route::prefix("controlescolar")->group(function () {
    
    #Comite academico
    # Configura la ruta principal de comite academico, si hay un usuario activo
    Route::get('ca/', [ComiteAcademicoController::class, 'index'])->name('comite')->middleware('auth');
        
    /*  Route::prefix('ca')->name('ca.')->group(function () {
        Route::get('/', [ComiteAcademicoController::class, 'index'])->name('index') //Ruta para acceder al comite academico
            ->middleware('auth');
    }); */

    Route::prefix('oldControlEscolar')->name('oldControlEscolar.')->group(function () {
        Route::get('/listOldDocuments', [OldDocumentController::class, 'listOldDocuments'])->name('listOldDocuments')
            ->middleware(['auth','role:admin']);

            Route::get('/listOldDocumentsIMAREC', [OldDocumentController::class, 'listOldDocumentsIMAREC'])->name('listOldDocumentsIMAREC')
            ->middleware(['auth','role:admin']);

            Route::get('/viewOldDocument/{idDocumento}/database/{nameDatabase}', [OldDocumentController::class, 'viewOldDocument'])->name('viewOldDocument')
            ->middleware(['auth','role:admin']);


            Route::get('/viewOldDocumentIMAREC/idSolicitud/{idSolicitud}/idTipoArchivo/{idTipoArchivo}/database/{nameDatabase}', [OldDocumentController::class, 'viewOldDocumentIMAREC'])->name('viewOldDocumentIMAREC')
            ->middleware(['auth','role:admin']);

    });

    # Rutas de autenticacion.
    Route::name('authenticate.')->group(function () {
        # Página principal.
        Route::get('/home', [HomeController::class, 'index'])->name('home')
            ->middleware('auth');

        # Inicio de sesión por OAUTH2.
        Route::get('/login', [LoginController::class, 'login'])->name('login')
            ->middleware('guest');

        // Route::post('/', [LoginController::class, 'LoginPostPreRegister'])->name('login.post.preRegister');
        Route::get('/auth/{id}', [LoginController::class, 'userFromPortal']);

        Route::post('/register', [LoginController::class, 'register'])->name('register')
            ->middleware('guest');
    });

    // # Rutas de admin.
    #Comentar linea de abajo para subir a produccion
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

    Route::prefix('nuevoExpediente')->name('nuevoExpediente.')->middleware(['auth'])->group(function () {

        Route::get('/showCreateNewArchive', [ArchiveController::class, 'showCreateNewArchive'])->name('showCreateNewArchive'); //Vista de expediente para alumno, rellenar campos
        Route::post('/createArchive', [ArchiveController::class, 'createArchive'])->name('createArchive'); //Vista de expediente para alumno, rellenar campos
    });

    Route::get('/showRegisterArchives', [ArchiveController::class, 'showRegisterArchives'])->name('showRegisterArchives'); //Vista de expediente para alumno, rellenar campos

    
    # Rutas de las solicitudes académicas.
    Route::prefix('solicitud')->name('solicitud.')->middleware(['auth'])->group(function () {

        Route::prefix('enrem')->name('enrem.')->group(function () {
            Route::get('expediente/archives/{archive}/{type}/{name}', [FileController::class, 'viewDocument'])->name('getArchive');
            
            Route::post('/updatePersonalData', [ArchiveEnremController::class, 'updatePersonalData'])->name('updatePersonalData');
            
            Route::get('/seeFileAnsweredToSign/{archive_id}', [ArchiveEnremController::class, 'seeFileAnsweredToSign'])->name('seeFileAnsweredToSign'); //Vista de expediente para alumno, rellenar campos
            Route::get('/getPDF/{archive_id}', [ArchiveEnremController::class, 'getPDF'])->name('getPDF'); //Vista de expediente para alumno, rellenar campos


            Route::prefix('address')->name('address.')->group(function () {
                Route::post('/update', [ArchiveEnremController::class, 'updateAddress'])->name('updateAddress');
            });

            Route::prefix('secondaryEducation')->name('secondaryEducation.')->group(function () {
                Route::post('/update', [ArchiveEnremController::class, 'updateSecondaryEducation'])->name('updateSecondaryEducation');
            });


            Route::prefix('higherEducation')->name('higherEducation.')->group(function () {
                Route::post('/update', [ArchiveEnremController::class, 'updateHigherEducation'])->name('updateHigherEducation');
            });

            Route::prefix('languageSkills')->name('languageSkills.')->group(function () {
                Route::post('/update', [ArchiveEnremController::class, 'updateLanguageSkills'])->name('updateLanguageSkills');
            });


            Route::prefix('environmentSkills')->name('environmentSkills.')->group(function () {
                Route::post('/update', [ArchiveEnremController::class, 'updateEnvironmentSkills'])->name('updateEnvironmentSkills');
            });


            Route::prefix('workingExperiences')->name('workingExperiences.')->group(function () {
                Route::post('/update', [ArchiveEnremController::class, 'updateWorkingExperiences'])->name('updateWorkingExperiences');
            });

            Route::prefix('reasonsToChoise')->name('reasonsToChoise.')->group(function () {
                Route::post('/update', [ArchiveEnremController::class, 'updateReasonsToChoise'])->name('updateReasonsToChoise');
            });
            
            Route::prefix('futurePlansExpectations')->name('futurePlansExpectations.')->group(function () {
                Route::post('/update', [ArchiveEnremController::class, 'updateFuturePlansExpectations'])->name('updateFuturePlansExpectations');
            });

            Route::prefix('fieldsOfInterest')->name('fieldsOfInterest.')->group(function () {
                Route::post('/update', [ArchiveEnremController::class, 'updateFieldsOfInterest'])->name('updateFieldsOfInterest');
            });

            Route::prefix('financingStudies')->name('financingStudies.')->group(function () {
                Route::post('/update', [ArchiveEnremController::class, 'updateFinancingStudies'])->name('updateFinancingStudies');
            });

            Route::prefix('lettersOfRecommendation')->name('lettersOfRecommendation.')->group(function () {
                Route::post('/update', [ArchiveEnremController::class, 'updateLettersOfRecommendation'])->name('updateLettersOfRecommendation');
                Route::post('/add', [ArchiveEnremController::class, 'addRecommendation']);
            });

            Route::prefix('hearAboutProgram')->name('hearAboutProgram.')->group(function () {
                Route::post('/update', [ArchiveEnremController::class, 'updateHearAboutProgram'])->name('updateHearAboutProgram');
            });
        });

        # Expedientes
        Route::get('/getFlagImage', [ImageController::class, 'getFlagImage'])->name('getFlagImage');
        Route::get('/getButtonImage', [ImageController::class, 'getButtonImage'])->name('getButtonImage');
        Route::get('/getAllButtonImage', [ImageController::class, 'getAllButtonImage'])->name('getAllButtonImage');
        Route::get('/getImageAcademicProgram', [ImageController::class, 'getImageAcademicProgram'])->name('getImageAcademicProgram');

        #Admin
        Route::get('/', [ArchiveController::class, 'index'])->middleware(['VerificarPostulante'])->name('index');
        Route::get('/archives', [ArchiveController::class, 'archives'])->name('archives');
        Route::get('/archives/professor', [ArchiveController::class, 'archivesProfessor'])->name('archivesProfessor');
        
        Route::get('/archives/getPrograms', [ArchiveController::class, 'getPrograms'])->name('getPrograms');
        Route::get('/archives/getAnnouncements', [ArchiveController::class, 'getAnnouncements'])->name('getAnnouncements');
        Route::get('/archives/getArchiveUsers', [ArchiveController::class, 'getUsersFromAnnouncement'])->name('getUsersFromAnnouncement');

        Route::get('/interview/{archive}', [ArchiveController::class, 'appliantFile_AdminView'])->name('showInterview'); //Vista de expediente pero sin poder modificar archivos
        Route::post('/updateStatusArchive', [ArchiveController::class, 'updateStatusArchive'])->name('updateStatus');
        Route::post('/sentEmailToUpdateDocuments', [ArchiveController::class, 'sentEmailToUpdateDocuments'])->name('sentEmailToUpdateDocuments');
        Route::post('/sentEmailRechazadoPostulacion', [ArchiveController::class, 'sentEmailRechazadoPostulacion'])->name('sentEmailRechazado');
        Route::post('/whoModifyArchive', [ArchiveController::class, 'whoModifyArchive'])->name('whoModifyArchive');

        #Appliant
        Route::get('/expediente/{archive}', [ArchiveController::class, 'appliantArchive'])->name('show');

        # Requisitos de ingreso.
        Route::get('/getEntranceRequiredDocuments', [ArchiveController::class, 'getEntranceRequiredDocuments'])->name('getEntranceRequiredDocuments');
        Route::get('/getExanniScore', [ArchiveController::class, 'getExanniScore'])->name('getExanniScore');
        Route::post('/updateExanniScore', [ArchiveController::class, 'updateExanniScore']);
        Route::post('/updateMotivation', [ArchiveController::class, 'updateMotivation']);
        Route::get('/getPersonalRequiredDocuments', [ArchiveController::class, 'getPersonalRequiredDocuments'])->name('getPersonalRequiredDocuments');
        Route::post('/updateArchivePersonalDocument', [ArchiveController::class, 'updateArchivePersonalDocument']);
        Route::post('/updateArchiveEntranceDocument', [ArchiveController::class, 'updateArchiveEntranceDocument']);

        # Grados académicos.
        Route::get('/{archive}/latestAcademicDegree', [AcademicDegreeController::class, 'latestAcademicDegree']);
        Route::post('/addAcademicDegree', [AcademicDegreeController::class, 'addAcademicDegree']);
        Route::post('/deleteAcademicDegree', [AcademicDegreeController::class, 'deleteAcademicDegree']);
        Route::post('/updateAcademicDegree', [AcademicDegreeController::class, 'updateAcademicDegree']);
        Route::post('/updateAcademicDegreeRequiredDocument', [AcademicDegreeController::class, 'updateAcademicDegreeRequiredDocument']);

        # Experiencia laboral.
        Route::post('/addWorkingExperience', [WorkingExperienceController::class, 'addWorkingExperience']);
        Route::post('/deleteWorkingExperience', [WorkingExperienceController::class, 'deleteWorkingExperience']);
        Route::post('/updateWorkingExperience', [WorkingExperienceController::class, 'updateWorkingExperience']);

        # Lenguas extranjeras del postulante.
        Route::post('/addAppliantLanguage', [AppliantLanguageController::class, 'addAppliantLanguage']);
        Route::post('/deleteAppliantLanguage', [AppliantLanguageController::class, 'deleteAppliantLanguage']);
        Route::post('/updateAppliantLanguage', [AppliantLanguageController::class, 'updateAppliantLanguage']);
        Route::post('/updateAppliantLanguageRequiredDocument', [AppliantLanguageController::class, 'updateAppliantLanguageRequiredDocument']);
       
        # Producciones científicas.
        //Modelos
        Route::post('/addScientificProduction', [ScientificProductionController::class, 'addScientificProduction']);
        Route::post('/deleteScientificProduction', [ScientificProductionController::class, 'deleteScientificProduction']);
        Route::post('/updateScientificProduction', [ScientificProductionController::class, 'updateScientificProduction']);
        //Autores
        Route::post('/addScientificProductionAuthor', [ScientificProductionController::class, 'addScientificProductionAuthor']);
        Route::post('/updateScientificProductionAuthor', [ScientificProductionController::class, 'updateScientificProductionAuthor']);
        Route::post('/deleteScientificProductionAuthor', [ScientificProductionController::class, 'deleteScientificProductionAuthor']);
        
        # Capital humano.
        Route::post('/addHumanCapital', [HumanCapitalController::class, 'addHumanCapital']);
        Route::post('/updateHumanCapital', [HumanCapitalController::class, 'updateHumanCapital']);
        Route::post('/deleteHumanCapital', [HumanCapitalController::class, 'deleteHumanCapital']);

        # Ver y descargar tipos de archivos.
        Route::get('expediente/archives/{archive}/{type}/{name}', [FileController::class, 'viewDocument'])->name('get');

        #Carta de recomendación {invitado - referente hacia un postulante}
        Route::post('/sentEmailRecommendationLetter', [ExternalRecommendationLetter::class, 'sentEmailRecommendationLetter']);
        Route::get('/seeAnsweredRecommendationLetter/{archive_id}/{rl_id}', [ExternalRecommendationLetter::class, 'seeAnsweredRecommendationLetter'])->name('seeAnswered');
    });

    # Rutas para las entrevistas.
    Route::prefix('entrevistas')->middleware(['auth', 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador'])->name('entrevistas.')->group(function () {

        # Calendario
        Route::get('calendario', [InterviewController::class, 'calendario'])->name('calendario');

        Route::post('setDictamenRedactor', [InterviewController::class, 'setRedactor'])->name('setRedactor');

        # Programa de entrevistas
        Route::get('programa', [InterviewController::class, 'programa'])->name('programa');

        # Programa de entrevistas
        Route::get('getFilteredInterviews', [InterviewController::class, 'getFilteredInterviews'])->name('getFilteredInterviews');

        Route::post('SendMailUpdateOnlyDocumentsForInterview', [InterviewController::class, 'SendMailUpdateOnlyDocumentsForInterview'])->name('SendMailUpdateOnlyDocumentsForInterview');

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
            Route::get('/promedio/{archive_id}', [EvaluationRubricController::class, 'show_average'])->middleware(['role:admin|coordinador'])->name('show_average');
            Route::get('/promedio/ca/{archive_id}', [EvaluationRubricController::class, 'show_average_ca'])->middleware(['role:admin|control_escolar|comite_academico'])->name('show_average_ca');

            // Export rubric to excel
            Route::get('/promedio/{archive_id}/export', [EvaluationRubricController::class, 'export_rubric'])->middleware(['role:admin|comite_academico|coordinador|control_escolar'])->name('export_rubric');

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
            Route::get('getNameWorkers', [AdminController::class, 'getNameWorkers'])
            ->name('getNameWorkers');

            

        Route::post('newWorker', [AdminController::class, 'newWorker'])
            ->name('newWorker');

        Route::post('updateWorker', [AdminController::class, 'updateWorker'])
            ->name('updateWorker');

        Route::post('deleteWorker', [AdminController::class, 'deleteWorker'])
            ->name('deleteWorker');
    });

    Route::prefix('updateDocuments')->name('updateDocuments.')->group(function () {
        Route::get('/show/{archive_id}/{personal_documents}/{entrance_documents}/{academic_documents}/{language_documents}/{working_documents}', [ArchiveController::class, 'showDocumentsFromEmail'])->name('show');
        Route::post('/updateArchivePersonalDocument', [ArchiveController::class, 'updateArchivePersonalDocument']);
        Route::post('/updateArchiveEntranceDocument', [ArchiveController::class, 'updateArchiveEntranceDocument']);
        Route::post('/updateAcademicDegreeRequiredDocument', [AcademicDegreeController::class, 'updateAcademicDegreeRequiredDocument']);
        Route::post('/updateAppliantLanguageRequiredDocument', [AppliantLanguageController::class, 'updateAppliantLanguageRequiredDocument']);
        Route::post('/updateArchiveInterviewDocument', [InterviewController::class, 'updateArchiveInterviewDocument']);
        // Faltaria la de working aqui y en solicitud tambien
        Route::get('/show/{archive_id}/{personal_documents}/{entrance_documents}/{academic_documents}/{language_documents}/{working_documents}/archives/{archive}/{type}/{name}', [FileController::class, 'viewDocument_extern'])->name('get_document');
        Route::post('/updateEnremDocument', [ArchiveEnremController::class, 'updateEnremDocument'])->name('updateEnremDocument');
    });

    Route::prefix('documentsForInterview')->name('documentsForInterview.')->group(function () {
        Route::get('/show/{archive_id}', [InterviewController::class, 'documentsForInterviewShow'])->name('show');
    });

    //El usuario no necesita estar autentificado (puede ser cualquier persona con la liga)
    Route::prefix('recommendationLetter')->name('recommendationLetter.')->group(function () {
        Route::get('/userCanSeeAnswered', [ExternalRecommendationLetter::class, 'userCanSeeAnswered'])->name('userCanSeeAnswered');
        # El que recive correo recibe la vista
        Route::get('/show/{token}', [ExternalRecommendationLetter::class, 'recommendationLetter'])->name('show');
        # Al guardar se hace la peticion para almacenar datos
        Route::post('addRecommendationLetter', [ExternalRecommendationLetter::class, 'addRecommendationLetter'])->name('store');
        Route::get('/pruebaPDF', [ExternalRecommendationLetter::class, 'pruebaPDF'])->name('prueba');
    });

    
//});
