<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/_debugbar/open' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.openhandler',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/stylesheets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.css',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/javascript' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.js',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::exRIhLuPfReMCxSb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oj3iQtE4Vv3fhIaU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'authenticate.prelogin',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Lm6Iqkm3wLwERCxH',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'authenticate.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'authenticate.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'authenticate.register',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/users/appliants' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.appliants',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/users/show' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.show',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/users/miPortalUser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.miPortalUser',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/pre-registro' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pre-registro.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'pre-registro.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/solicitud/getRol' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.getRol',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/solicitud' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/solicitud/archives' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.archives',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/solicitud/archives/professor' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.archivesProfessor',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/entrevistas/calendario' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.calendario',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/entrevistas/programa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.programa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/entrevistas/nuevaEntrevista' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.nuevaEntrevista',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/entrevistas/confirmInterview' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.confirmInterview',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/entrevistas/reopenInterview' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.reopenInterview',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/entrevistas/deleteInterview' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.deleteInterview',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/entrevistas/interviewUser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.interviewUser',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.interviewUserDelete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/entrevistas/periods' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.periods.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.periods.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/entrevistas/zoom' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.zoom.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.zoom.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/admin/workers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.workers',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/admin/newWorker' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.newWorker',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/admin/updateWorker' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateWorker',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/admin/deleteWorker' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.deleteWorker',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/updateDocuments/updateStateFromEmail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateDocuments.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/updateDocuments/updateArchivePersonalDocument' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateDocuments.',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/updateDocuments/updateArchiveEntranceDocument' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateDocuments.generated::e44ZiysOH7u6LKif',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/updateDocuments/updateAcademicDegreeRequiredDocument' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateDocuments.generated::Mvrpye6R2ESEnx9Q',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/updateDocuments/updateAppliantLanguageRequiredDocument' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateDocuments.generated::8hhmMdDoug5xhZQ3',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/updateDocuments/updateStatusArchive' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateDocuments.updateStatus',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/recommendationLetter/addRecommendationLetter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'recommendationLetter.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/controlescolar/recommendationLetter/pruebaPDF' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'recommendationLetter.prueba',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/_debugbar/c(?|lockwork/([^/]++)(*:39)|ache/([^/]++)(?:/([^/]++))?(*:73))|/downloadLetterCommitment/([^/]++)/([^/]++)/([^/]++)(*:133)|/controlescolar/(?|auth/([^/]++)(*:173)|prueba/([^/]++)(*:196)|solicitud/(?|([^/]++)(*:225)|interview/([^/]++)(*:251)|update(?|StatusArchive(*:281)|Motivation(*:299)|Archive(?|PersonalDocument(*:333)|EntranceDocument(*:357)))|sentEmail(?|ToUpdateDocuments(*:396)|RechazadoPostulacion(*:424))|expediente/([^/]++)(*:452)|([^/]++)/latestAcademicDegree(*:489)|add(?|A(?|cademicDegree(*:520)|ppliantLanguage(*:543))|WorkingExperience(*:569)|ScientificProduction(?|(*:600)|Author(*:614))|HumanCapital(*:635))|delete(?|A(?|cademicDegree(*:670)|ppliantLanguage(*:693))|WorkingExperience(*:719)|ScientificProduction(?|(*:750)|Author(*:764))|HumanCapital(*:785))|update(?|A(?|cademicDegree(?|(*:823)|RequiredDocument(*:847))|ppliantLanguage(?|(*:874)|RequiredDocument(*:898)))|WorkingExperience(*:925)|ScientificProduction(?|(*:956)|Author(*:970))|HumanCapital(*:991))|expediente/archives/([^/]++)/([^/]++)/([^/]++)(*:1046)|se(?|ntEmailRecommendationLetter(*:1087)|eAnsweredRecommendationLetter/([^/]++)/([^/]++)(*:1143)))|entrevistas/(?|rubrica/([^/]++)(?|(*:1188)|/([^/]++)(*:1206)|(*:1215))|periods/([^/]++)(?|(*:1244))|zoom/([^/]++)(?|(*:1270)))|updateDocuments/show/([^/]++)/([^/]++)/([^/]++)/([^/]++)/([^/]++)/([^/]++)(?|(*:1358)|/archives/([^/]++)/([^/]++)/([^/]++)(*:1403))|documentsForInterview/show/([^/]++)(*:1448)|recommendationLetter/show/([^/]++)(*:1491)))/?$}sDu',
    ),
    3 => 
    array (
      39 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.clockwork',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      73 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.cache.delete',
            'tags' => NULL,
          ),
          1 => 
          array (
            0 => 'key',
            1 => 'tags',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      133 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'letterCommitment',
          ),
          1 => 
          array (
            0 => 'folderParent',
            1 => 'folderType',
            2 => 'namefile',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      173 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'authenticate.',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      196 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Gyhig6hLo5JHo4Jz',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      225 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.show',
          ),
          1 => 
          array (
            0 => 'archive',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      251 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.showInterview',
          ),
          1 => 
          array (
            0 => 'archive',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      281 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.updateStatus',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      299 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      333 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::Gsk7zocC8eoEYqts',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      357 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::DV2W4PIuMZ96dPY9',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      396 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.sentEmailToUpdateDocuments',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      424 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.sentEmailRechazado',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      452 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.ExpedientePostulante',
          ),
          1 => 
          array (
            0 => 'user_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      489 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::zzQMoso5J5NqHV4A',
          ),
          1 => 
          array (
            0 => 'archive',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      520 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::mNqp7ajx7Rq1v1Kt',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      543 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::IYG77F3dHwEhFYwj',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      569 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::lCAEfVpZntECSn8F',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      600 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::RbQPSWIWXDbZ4Rys',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      614 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::00yjQANscqbKKZ5T',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      635 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::TPAFycw9kfzxXeuy',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      670 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::sM6N9nLqRum2h2AU',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      693 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::TZA2FxeDO1WwmVqv',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      719 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::GjHVmL1CscCMgXCY',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      750 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::00PSNeSp3DKI57ZE',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      764 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::fLN7sdK0qEdGqAI6',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      785 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::7qcfDLkwHD9QMEzN',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      823 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::I7UjRuqcqg3exH6z',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      847 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::HcZcgFXHqVlGYYFZ',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      874 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::vp9OHsrnFZWOVn37',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      898 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::DauPzV8CbsmLNSFh',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      925 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::reBdWd5qK16KaLsd',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      956 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::qn5TwGp6HUXJLgLN',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      970 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::GGFDor80xHNe8VWD',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      991 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::YjcgoB01sYsVnSWM',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1046 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.get',
          ),
          1 => 
          array (
            0 => 'archive',
            1 => 'type',
            2 => 'name',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1087 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::NW65n7FskMGIcryr',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1143 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.seeAnswered',
          ),
          1 => 
          array (
            0 => 'archive_id',
            1 => 'rl_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1188 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.rubrica.show',
          ),
          1 => 
          array (
            0 => 'evaluationRubric',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1206 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.rubrica.show_average',
          ),
          1 => 
          array (
            0 => 'grade',
            1 => 'postulante_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1215 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.rubrica.update',
          ),
          1 => 
          array (
            0 => 'evaluationRubric',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.rubrica.destroy',
          ),
          1 => 
          array (
            0 => 'evaluationRubric',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1244 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.periods.show',
          ),
          1 => 
          array (
            0 => 'period',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.periods.update',
          ),
          1 => 
          array (
            0 => 'period',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.periods.destroy',
          ),
          1 => 
          array (
            0 => 'period',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1270 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.zoom.show',
          ),
          1 => 
          array (
            0 => 'zoom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.zoom.update',
          ),
          1 => 
          array (
            0 => 'zoom',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.zoom.destroy',
          ),
          1 => 
          array (
            0 => 'zoom',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1358 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateDocuments.show',
          ),
          1 => 
          array (
            0 => 'archive_id',
            1 => 'personal_documents',
            2 => 'entrance_documents',
            3 => 'academic_documents',
            4 => 'language_documents',
            5 => 'working_documents',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1403 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateDocuments.get_document',
          ),
          1 => 
          array (
            0 => 'archive_id',
            1 => 'personal_documents',
            2 => 'entrance_documents',
            3 => 'academic_documents',
            4 => 'language_documents',
            5 => 'working_documents',
            6 => 'archive',
            7 => 'type',
            8 => 'name',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1448 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'documentsForInterview.show',
          ),
          1 => 
          array (
            0 => 'archive_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1491 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'recommendationLetter.show',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'debugbar.openhandler' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/open',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'as' => 'debugbar.openhandler',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.clockwork' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/clockwork/{id}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'as' => 'debugbar.clockwork',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.css' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/stylesheets',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'as' => 'debugbar.assets.css',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.js' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/javascript',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'as' => 'debugbar.assets.js',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.cache.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '_debugbar/cache/{key}/{tags?}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'as' => 'debugbar.cache.delete',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::exRIhLuPfReMCxSb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::exRIhLuPfReMCxSb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oj3iQtE4Vv3fhIaU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000004724b0eb000000000e8cf069";}";s:4:"hash";s:44:"lor9Zvw9orVgulBZnuORo4Bh6f6y4BrVBnknQKxf3Xw=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::oj3iQtE4Vv3fhIaU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'authenticate.prelogin' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@prelogin',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@prelogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'authenticate.prelogin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Lm6Iqkm3wLwERCxH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'controlescolar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => '\\Illuminate\\Routing\\RedirectController@__invoke',
        'controller' => '\\Illuminate\\Routing\\RedirectController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Lm6Iqkm3wLwERCxH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'destination' => 'pre-registro',
        'status' => 302,
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'letterCommitment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'downloadLetterCommitment/{folderParent}/{folderType}/{namefile}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\FileController@downloadLetterCommitment',
        'controller' => 'App\\Http\\Controllers\\FileController@downloadLetterCommitment',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'letterCommitment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'authenticate.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'as' => 'authenticate.home',
        'namespace' => NULL,
        'prefix' => '/controlescolar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'authenticate.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'as' => 'authenticate.login',
        'namespace' => NULL,
        'prefix' => '/controlescolar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'authenticate.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/auth/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@userFromPortal',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@userFromPortal',
        'as' => 'authenticate.',
        'namespace' => NULL,
        'prefix' => '/controlescolar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'authenticate.register' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@register',
        'as' => 'authenticate.register',
        'namespace' => NULL,
        'prefix' => '/controlescolar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Gyhig6hLo5JHo4Jz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/prueba/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@testLogin',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@testLogin',
        'namespace' => NULL,
        'prefix' => '/controlescolar',
        'where' => 
        array (
        ),
        'as' => 'generated::Gyhig6hLo5JHo4Jz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => NULL,
        'prefix' => '/controlescolar',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@index',
        'controller' => 'App\\Http\\Controllers\\UserController@index',
        'as' => 'users.index',
        'namespace' => NULL,
        'prefix' => 'controlescolar/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.appliants' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/users/appliants',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@appliants',
        'controller' => 'App\\Http\\Controllers\\UserController@appliants',
        'as' => 'users.appliants',
        'namespace' => NULL,
        'prefix' => 'controlescolar/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.show' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/users/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@show',
        'controller' => 'App\\Http\\Controllers\\UserController@show',
        'as' => 'users.show',
        'namespace' => NULL,
        'prefix' => 'controlescolar/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.miPortalUser' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/users/miPortalUser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PreRegisterController@miPortalUser',
        'controller' => 'App\\Http\\Controllers\\PreRegisterController@miPortalUser',
        'as' => 'users.miPortalUser',
        'namespace' => NULL,
        'prefix' => 'controlescolar/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pre-registro.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/pre-registro',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\PreRegisterController@index',
        'controller' => 'App\\Http\\Controllers\\PreRegisterController@index',
        'as' => 'pre-registro.index',
        'namespace' => NULL,
        'prefix' => 'controlescolar/pre-registro',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pre-registro.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/pre-registro',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\PreRegisterController@store',
        'controller' => 'App\\Http\\Controllers\\PreRegisterController@store',
        'as' => 'pre-registro.store',
        'namespace' => NULL,
        'prefix' => 'controlescolar/pre-registro',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.getRol' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/solicitud/getRol',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@getRol',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@getRol',
        'as' => 'solicitud.getRol',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/solicitud',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'VerificarPostulante',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@index',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@index',
        'as' => 'solicitud.index',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.archives' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/solicitud/archives',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@archives',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@archives',
        'as' => 'solicitud.archives',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.archivesProfessor' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/solicitud/archives/professor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@archivesProfessor',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@archivesProfessor',
        'as' => 'solicitud.archivesProfessor',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/solicitud/{archive}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@appliantFile_AdminView',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@appliantFile_AdminView',
        'as' => 'solicitud.show',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.showInterview' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/solicitud/interview/{archive}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@appliantFile_AdminView',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@appliantFile_AdminView',
        'as' => 'solicitud.showInterview',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.updateStatus' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/updateStatusArchive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateStatusArchive',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateStatusArchive',
        'as' => 'solicitud.updateStatus',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.sentEmailToUpdateDocuments' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/sentEmailToUpdateDocuments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@sentEmailToUpdateDocuments',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@sentEmailToUpdateDocuments',
        'as' => 'solicitud.sentEmailToUpdateDocuments',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.sentEmailRechazado' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/sentEmailRechazadoPostulacion',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@sentEmailRechazadoPostulacion',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@sentEmailRechazadoPostulacion',
        'as' => 'solicitud.sentEmailRechazado',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.ExpedientePostulante' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/solicitud/expediente/{user_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@appliantFile_AppliantView',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@appliantFile_AppliantView',
        'as' => 'solicitud.ExpedientePostulante',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/updateMotivation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateMotivation',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateMotivation',
        'as' => 'solicitud.',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::Gsk7zocC8eoEYqts' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/updateArchivePersonalDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateArchivePersonalDocument',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateArchivePersonalDocument',
        'as' => 'solicitud.generated::Gsk7zocC8eoEYqts',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::DV2W4PIuMZ96dPY9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/updateArchiveEntranceDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateArchiveEntranceDocument',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateArchiveEntranceDocument',
        'as' => 'solicitud.generated::DV2W4PIuMZ96dPY9',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::zzQMoso5J5NqHV4A' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/solicitud/{archive}/latestAcademicDegree',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@latestAcademicDegree',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@latestAcademicDegree',
        'as' => 'solicitud.generated::zzQMoso5J5NqHV4A',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::mNqp7ajx7Rq1v1Kt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/addAcademicDegree',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@addAcademicDegree',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@addAcademicDegree',
        'as' => 'solicitud.generated::mNqp7ajx7Rq1v1Kt',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::sM6N9nLqRum2h2AU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/deleteAcademicDegree',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@deleteAcademicDegree',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@deleteAcademicDegree',
        'as' => 'solicitud.generated::sM6N9nLqRum2h2AU',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::I7UjRuqcqg3exH6z' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/updateAcademicDegree',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateAcademicDegree',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateAcademicDegree',
        'as' => 'solicitud.generated::I7UjRuqcqg3exH6z',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::HcZcgFXHqVlGYYFZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/updateAcademicDegreeRequiredDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateAcademicDegreeRequiredDocument',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateAcademicDegreeRequiredDocument',
        'as' => 'solicitud.generated::HcZcgFXHqVlGYYFZ',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::lCAEfVpZntECSn8F' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/addWorkingExperience',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@addWorkingExperience',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@addWorkingExperience',
        'as' => 'solicitud.generated::lCAEfVpZntECSn8F',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::GjHVmL1CscCMgXCY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/deleteWorkingExperience',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@deleteWorkingExperience',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@deleteWorkingExperience',
        'as' => 'solicitud.generated::GjHVmL1CscCMgXCY',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::reBdWd5qK16KaLsd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/updateWorkingExperience',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateWorkingExperience',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateWorkingExperience',
        'as' => 'solicitud.generated::reBdWd5qK16KaLsd',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::IYG77F3dHwEhFYwj' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/addAppliantLanguage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@addAppliantLanguage',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@addAppliantLanguage',
        'as' => 'solicitud.generated::IYG77F3dHwEhFYwj',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::TZA2FxeDO1WwmVqv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/deleteAppliantLanguage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@deleteAppliantLanguage',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@deleteAppliantLanguage',
        'as' => 'solicitud.generated::TZA2FxeDO1WwmVqv',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::vp9OHsrnFZWOVn37' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/updateAppliantLanguage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateAppliantLanguage',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateAppliantLanguage',
        'as' => 'solicitud.generated::vp9OHsrnFZWOVn37',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::DauPzV8CbsmLNSFh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/updateAppliantLanguageRequiredDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateAppliantLanguageRequiredDocument',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateAppliantLanguageRequiredDocument',
        'as' => 'solicitud.generated::DauPzV8CbsmLNSFh',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::RbQPSWIWXDbZ4Rys' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/addScientificProduction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@addScientificProduction',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@addScientificProduction',
        'as' => 'solicitud.generated::RbQPSWIWXDbZ4Rys',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::00PSNeSp3DKI57ZE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/deleteScientificProduction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@deleteScientificProduction',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@deleteScientificProduction',
        'as' => 'solicitud.generated::00PSNeSp3DKI57ZE',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::qn5TwGp6HUXJLgLN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/updateScientificProduction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateScientificProduction',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateScientificProduction',
        'as' => 'solicitud.generated::qn5TwGp6HUXJLgLN',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::00yjQANscqbKKZ5T' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/addScientificProductionAuthor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@addScientificProductionAuthor',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@addScientificProductionAuthor',
        'as' => 'solicitud.generated::00yjQANscqbKKZ5T',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::GGFDor80xHNe8VWD' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/updateScientificProductionAuthor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateScientificProductionAuthor',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateScientificProductionAuthor',
        'as' => 'solicitud.generated::GGFDor80xHNe8VWD',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::fLN7sdK0qEdGqAI6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/deleteScientificProductionAuthor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@deleteScientificProductionAuthor',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@deleteScientificProductionAuthor',
        'as' => 'solicitud.generated::fLN7sdK0qEdGqAI6',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::TPAFycw9kfzxXeuy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/addHumanCapital',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@addHumanCapital',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@addHumanCapital',
        'as' => 'solicitud.generated::TPAFycw9kfzxXeuy',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::YjcgoB01sYsVnSWM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/updateHumanCapital',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateHumanCapital',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateHumanCapital',
        'as' => 'solicitud.generated::YjcgoB01sYsVnSWM',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::7qcfDLkwHD9QMEzN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/deleteHumanCapital',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@deleteHumanCapital',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@deleteHumanCapital',
        'as' => 'solicitud.generated::7qcfDLkwHD9QMEzN',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/solicitud/expediente/archives/{archive}/{type}/{name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\FileController@viewDocument',
        'controller' => 'App\\Http\\Controllers\\FileController@viewDocument',
        'as' => 'solicitud.get',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.generated::NW65n7FskMGIcryr' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/solicitud/sentEmailRecommendationLetter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@sentEmailRecommendationLetter',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@sentEmailRecommendationLetter',
        'as' => 'solicitud.generated::NW65n7FskMGIcryr',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'solicitud.seeAnswered' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/solicitud/seeAnsweredRecommendationLetter/{archive_id}/{rl_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ExternalRecommendationLetter@seeAnsweredRecommendationLetter',
        'controller' => 'App\\Http\\Controllers\\ExternalRecommendationLetter@seeAnsweredRecommendationLetter',
        'as' => 'solicitud.seeAnswered',
        'namespace' => NULL,
        'prefix' => 'controlescolar/solicitud',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.calendario' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/entrevistas/calendario',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@calendario',
        'controller' => 'App\\Http\\Controllers\\InterviewController@calendario',
        'as' => 'entrevistas.calendario',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.programa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/entrevistas/programa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@programa',
        'controller' => 'App\\Http\\Controllers\\InterviewController@programa',
        'as' => 'entrevistas.programa',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.nuevaEntrevista' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/entrevistas/nuevaEntrevista',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@nuevaEntrevista',
        'controller' => 'App\\Http\\Controllers\\InterviewController@nuevaEntrevista',
        'as' => 'entrevistas.nuevaEntrevista',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.confirmInterview' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/entrevistas/confirmInterview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@confirmInterview',
        'controller' => 'App\\Http\\Controllers\\InterviewController@confirmInterview',
        'as' => 'entrevistas.confirmInterview',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.reopenInterview' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/entrevistas/reopenInterview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@reopenInterview',
        'controller' => 'App\\Http\\Controllers\\InterviewController@reopenInterview',
        'as' => 'entrevistas.reopenInterview',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.deleteInterview' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/entrevistas/deleteInterview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@deleteInterview',
        'controller' => 'App\\Http\\Controllers\\InterviewController@deleteInterview',
        'as' => 'entrevistas.deleteInterview',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.interviewUser' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/entrevistas/interviewUser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@newInterviewUser',
        'controller' => 'App\\Http\\Controllers\\InterviewController@newInterviewUser',
        'as' => 'entrevistas.interviewUser',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.interviewUserDelete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'controlescolar/entrevistas/interviewUser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@removeInterviewUser',
        'controller' => 'App\\Http\\Controllers\\InterviewController@removeInterviewUser',
        'as' => 'entrevistas.interviewUserDelete',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.rubrica.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/entrevistas/rubrica/{evaluationRubric}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'uses' => 'App\\Http\\Controllers\\EvaluationRubricController@show',
        'controller' => 'App\\Http\\Controllers\\EvaluationRubricController@show',
        'as' => 'entrevistas.rubrica.show',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas/rubrica',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.rubrica.show_average' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/entrevistas/rubrica/{grade}/{postulante_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
          3 => 'role:admin|comite_academico|coordinador',
        ),
        'uses' => 'App\\Http\\Controllers\\EvaluationRubricController@show_average',
        'controller' => 'App\\Http\\Controllers\\EvaluationRubricController@show_average',
        'as' => 'entrevistas.rubrica.show_average',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas/rubrica',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.rubrica.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'controlescolar/entrevistas/rubrica/{evaluationRubric}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'uses' => 'App\\Http\\Controllers\\EvaluationRubricController@update',
        'controller' => 'App\\Http\\Controllers\\EvaluationRubricController@update',
        'as' => 'entrevistas.rubrica.update',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas/rubrica',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.rubrica.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'controlescolar/entrevistas/rubrica/{evaluationRubric}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'uses' => 'App\\Http\\Controllers\\EvaluationRubricController@destroy',
        'controller' => 'App\\Http\\Controllers\\EvaluationRubricController@destroy',
        'as' => 'entrevistas.rubrica.destroy',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas/rubrica',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.periods.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/entrevistas/periods',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'as' => 'entrevistas.periods.index',
        'uses' => 'App\\Http\\Controllers\\PeriodController@index',
        'controller' => 'App\\Http\\Controllers\\PeriodController@index',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.periods.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/entrevistas/periods',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'as' => 'entrevistas.periods.store',
        'uses' => 'App\\Http\\Controllers\\PeriodController@store',
        'controller' => 'App\\Http\\Controllers\\PeriodController@store',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.periods.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/entrevistas/periods/{period}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'as' => 'entrevistas.periods.show',
        'uses' => 'App\\Http\\Controllers\\PeriodController@show',
        'controller' => 'App\\Http\\Controllers\\PeriodController@show',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.periods.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'controlescolar/entrevistas/periods/{period}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'as' => 'entrevistas.periods.update',
        'uses' => 'App\\Http\\Controllers\\PeriodController@update',
        'controller' => 'App\\Http\\Controllers\\PeriodController@update',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.periods.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'controlescolar/entrevistas/periods/{period}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'as' => 'entrevistas.periods.destroy',
        'uses' => 'App\\Http\\Controllers\\PeriodController@destroy',
        'controller' => 'App\\Http\\Controllers\\PeriodController@destroy',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.zoom.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/entrevistas/zoom',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'as' => 'entrevistas.zoom.index',
        'uses' => 'ZoomController@index',
        'controller' => 'ZoomController@index',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.zoom.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/entrevistas/zoom',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'as' => 'entrevistas.zoom.store',
        'uses' => 'ZoomController@store',
        'controller' => 'ZoomController@store',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.zoom.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/entrevistas/zoom/{zoom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'as' => 'entrevistas.zoom.show',
        'uses' => 'ZoomController@show',
        'controller' => 'ZoomController@show',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.zoom.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'controlescolar/entrevistas/zoom/{zoom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'as' => 'entrevistas.zoom.update',
        'uses' => 'ZoomController@update',
        'controller' => 'ZoomController@update',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'entrevistas.zoom.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'controlescolar/entrevistas/zoom/{zoom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'as' => 'entrevistas.zoom.destroy',
        'uses' => 'ZoomController@destroy',
        'controller' => 'ZoomController@destroy',
        'namespace' => NULL,
        'prefix' => 'controlescolar/entrevistas',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@index',
        'controller' => 'App\\Http\\Controllers\\AdminController@index',
        'as' => 'admin.index',
        'namespace' => NULL,
        'prefix' => 'controlescolar/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.workers' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/admin/workers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@workers',
        'controller' => 'App\\Http\\Controllers\\AdminController@workers',
        'as' => 'admin.workers',
        'namespace' => NULL,
        'prefix' => 'controlescolar/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.newWorker' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/admin/newWorker',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@newWorker',
        'controller' => 'App\\Http\\Controllers\\AdminController@newWorker',
        'as' => 'admin.newWorker',
        'namespace' => NULL,
        'prefix' => 'controlescolar/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateWorker' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/admin/updateWorker',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@updateWorker',
        'controller' => 'App\\Http\\Controllers\\AdminController@updateWorker',
        'as' => 'admin.updateWorker',
        'namespace' => NULL,
        'prefix' => 'controlescolar/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.deleteWorker' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/admin/deleteWorker',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@deleteWorker',
        'controller' => 'App\\Http\\Controllers\\AdminController@deleteWorker',
        'as' => 'admin.deleteWorker',
        'namespace' => NULL,
        'prefix' => 'controlescolar/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateDocuments.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/updateDocuments/show/{archive_id}/{personal_documents}/{entrance_documents}/{academic_documents}/{language_documents}/{working_documents}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@showDocumentsFromEmail',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@showDocumentsFromEmail',
        'as' => 'updateDocuments.show',
        'namespace' => NULL,
        'prefix' => 'controlescolar/updateDocuments',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateDocuments.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/updateDocuments/updateStateFromEmail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateStateFromEmail',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateStateFromEmail',
        'as' => 'updateDocuments.update',
        'namespace' => NULL,
        'prefix' => 'controlescolar/updateDocuments',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateDocuments.' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/updateDocuments/updateArchivePersonalDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateArchivePersonalDocument',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateArchivePersonalDocument',
        'as' => 'updateDocuments.',
        'namespace' => NULL,
        'prefix' => 'controlescolar/updateDocuments',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateDocuments.generated::e44ZiysOH7u6LKif' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/updateDocuments/updateArchiveEntranceDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateArchiveEntranceDocument',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateArchiveEntranceDocument',
        'as' => 'updateDocuments.generated::e44ZiysOH7u6LKif',
        'namespace' => NULL,
        'prefix' => 'controlescolar/updateDocuments',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateDocuments.generated::Mvrpye6R2ESEnx9Q' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/updateDocuments/updateAcademicDegreeRequiredDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateAcademicDegreeRequiredDocument',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateAcademicDegreeRequiredDocument',
        'as' => 'updateDocuments.generated::Mvrpye6R2ESEnx9Q',
        'namespace' => NULL,
        'prefix' => 'controlescolar/updateDocuments',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateDocuments.generated::8hhmMdDoug5xhZQ3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/updateDocuments/updateAppliantLanguageRequiredDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateAppliantLanguageRequiredDocument',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateAppliantLanguageRequiredDocument',
        'as' => 'updateDocuments.generated::8hhmMdDoug5xhZQ3',
        'namespace' => NULL,
        'prefix' => 'controlescolar/updateDocuments',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateDocuments.get_document' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/updateDocuments/show/{archive_id}/{personal_documents}/{entrance_documents}/{academic_documents}/{language_documents}/{working_documents}/archives/{archive}/{type}/{name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\FileController@viewDocument_extern',
        'controller' => 'App\\Http\\Controllers\\FileController@viewDocument_extern',
        'as' => 'updateDocuments.get_document',
        'namespace' => NULL,
        'prefix' => 'controlescolar/updateDocuments',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateDocuments.updateStatus' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/updateDocuments/updateStatusArchive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateStatusArchive',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateStatusArchive',
        'as' => 'updateDocuments.updateStatus',
        'namespace' => NULL,
        'prefix' => 'controlescolar/updateDocuments',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'documentsForInterview.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/documentsForInterview/show/{archive_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:aspirante_local|aspirante_foraneo|aspirante_extranjero',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@documentsForInterview',
        'controller' => 'App\\Http\\Controllers\\InterviewController@documentsForInterview',
        'as' => 'documentsForInterview.show',
        'namespace' => NULL,
        'prefix' => 'controlescolar/documentsForInterview',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'recommendationLetter.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/recommendationLetter/show/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ExternalRecommendationLetter@recommendationLetter',
        'controller' => 'App\\Http\\Controllers\\ExternalRecommendationLetter@recommendationLetter',
        'as' => 'recommendationLetter.show',
        'namespace' => NULL,
        'prefix' => 'controlescolar/recommendationLetter',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'recommendationLetter.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'controlescolar/recommendationLetter/addRecommendationLetter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ExternalRecommendationLetter@addRecommendationLetter',
        'controller' => 'App\\Http\\Controllers\\ExternalRecommendationLetter@addRecommendationLetter',
        'as' => 'recommendationLetter.store',
        'namespace' => NULL,
        'prefix' => 'controlescolar/recommendationLetter',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'recommendationLetter.prueba' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'controlescolar/recommendationLetter/pruebaPDF',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ExternalRecommendationLetter@pruebaPDF',
        'controller' => 'App\\Http\\Controllers\\ExternalRecommendationLetter@pruebaPDF',
        'as' => 'recommendationLetter.prueba',
        'namespace' => NULL,
        'prefix' => 'controlescolar/recommendationLetter',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
