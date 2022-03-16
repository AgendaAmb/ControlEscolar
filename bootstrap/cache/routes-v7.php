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
            '_route' => 'generated::oU7eq62dpiDeXfBl',
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
            '_route' => 'generated::p1WJIO6ue3zwXLYH',
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
            '_route' => 'generated::0F0blHEVWZ2hJSRa',
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
      '/home' => 
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
      '/login' => 
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
      '/register' => 
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
      '/logout' => 
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
      '/users' => 
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
      '/users/appliants' => 
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
      '/users/show' => 
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
      '/users/miPortalUser' => 
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
      '/pre-registro' => 
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
      '/solicitud' => 
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
      '/solicitud/archives' => 
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
      '/entrevistas/calendario' => 
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
      '/entrevistas/programa' => 
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
      '/entrevistas/nuevaEntrevista' => 
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
      '/entrevistas/confirmInterview' => 
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
      '/entrevistas/reopenInterview' => 
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
      '/entrevistas/deleteInterview' => 
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
      '/entrevistas/interviewUser' => 
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
      '/entrevistas/periods' => 
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
      '/entrevistas/zoom' => 
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
      '/admin' => 
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
      '/admin/workers' => 
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
      '/admin/newWorker' => 
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
      '/recommendationLetter/addRecommendationLetter' => 
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
      '/recommendationLetter/pruebaPDF' => 
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
      '/pruebaRegistro' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kPQXAIjon3z1ucWh',
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
      0 => '{^(?|/_debugbar/c(?|lockwork/([^/]++)(*:39)|ache/([^/]++)(?:/([^/]++))?(*:73))|/auth/([^/]++)(*:95)|/solicitud/(?|([^/]++)(*:124)|expediente/([^/]++)(*:151)|update(?|Motivation(*:178)|Archive(?|PersonalDocument(*:212)|EntranceDocument(*:236)))|([^/]++)/latestAcademicDegree(*:275)|update(?|A(?|cademicDegree(?|(*:312)|RequiredDocument(*:336))|ppliantLanguage(?|(*:363)|RequiredDocument(*:387)))|WorkingExperience(*:414)|ScientificProduction(?|(*:445)|Author(*:459))|HumanCapital(*:480))|a(?|ddScientificProductionAuthor(*:521)|rchives/([^/]++)/([^/]++)/([^/]++)(*:563))|sentEmailRecommendationLetter(*:601))|/entrevistas/(?|rubrica/([^/]++)(?|(*:645))|periods/([^/]++)(?|(*:673))|zoom/([^/]++)(?|(*:698)))|/recommendationLetter/show/([^/]++)(*:743))/?$}sDu',
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
      95 => 
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
      124 => 
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
      151 => 
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
      178 => 
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
      212 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::1Zr0LyXdxU6p3MhK',
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
      236 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::e4gd2L7CQfdaLD6k',
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
      275 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::cemdY92SlsN9bwPt',
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
      312 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::mX25EbjjzWD6wjdd',
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
      336 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::L2dX1bNLeIAZ8DiP',
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
      363 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::ZrrEH1y9yNPzLSjR',
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
      387 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::R06jMPMYfJvJZGZD',
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
      414 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::kpsBC9mSrYTKaLtm',
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
      445 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::dbxYmmBVCOhsJ9ZV',
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
      459 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::sMuQkmLISytoeMFL',
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
      480 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::II5zAJOfjwB0GLyf',
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
      521 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::w57int9GDrfuHwig',
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
      563 => 
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
      601 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::3iV1zNozrzSmkdqZ',
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
      645 => 
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
        1 => 
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
        2 => 
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
      673 => 
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
      698 => 
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
      743 => 
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
    'generated::oU7eq62dpiDeXfBl' => 
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
        'as' => 'generated::oU7eq62dpiDeXfBl',
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
    'generated::p1WJIO6ue3zwXLYH' => 
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000010798b3200000000626cb2f3";}";s:4:"hash";s:44:"wQJ6V8tmAMWBlTyeQEmwWW1XD74ear06ydvytCqOhr0=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::p1WJIO6ue3zwXLYH',
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
    'generated::0F0blHEVWZ2hJSRa' => 
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
        'as' => 'generated::0F0blHEVWZ2hJSRa',
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
    'authenticate.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'home',
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
        'prefix' => '',
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
      'uri' => 'login',
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
        'prefix' => '',
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
      'uri' => 'auth/{id}',
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
        'prefix' => '',
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
      'uri' => 'register',
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
        'prefix' => '',
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
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => NULL,
        'prefix' => '',
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
      'uri' => 'users',
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
        'prefix' => '/users',
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
      'uri' => 'users/appliants',
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
        'prefix' => '/users',
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
      'uri' => 'users/show',
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
        'prefix' => '/users',
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
      'uri' => 'users/miPortalUser',
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
        'prefix' => '/users',
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
      'uri' => 'pre-registro',
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
        'prefix' => '/pre-registro',
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
      'uri' => 'pre-registro',
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
        'prefix' => '/pre-registro',
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
      'uri' => 'solicitud',
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
        'prefix' => '/solicitud',
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
      'uri' => 'solicitud/archives',
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
        'prefix' => '/solicitud',
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
      'uri' => 'solicitud/{archive}',
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
        'prefix' => '/solicitud',
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
      'uri' => 'solicitud/expediente/{user_id}',
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
        'prefix' => '/solicitud',
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
      'uri' => 'solicitud/updateMotivation',
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
        'prefix' => '/solicitud',
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
    'solicitud.generated::1Zr0LyXdxU6p3MhK' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/updateArchivePersonalDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateArchivePersonalDocument',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateArchivePersonalDocument',
        'as' => 'solicitud.generated::1Zr0LyXdxU6p3MhK',
        'namespace' => NULL,
        'prefix' => '/solicitud',
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
    'solicitud.generated::e4gd2L7CQfdaLD6k' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/updateArchiveEntranceDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateArchiveEntranceDocument',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateArchiveEntranceDocument',
        'as' => 'solicitud.generated::e4gd2L7CQfdaLD6k',
        'namespace' => NULL,
        'prefix' => '/solicitud',
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
    'solicitud.generated::cemdY92SlsN9bwPt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'solicitud/{archive}/latestAcademicDegree',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@latestAcademicDegree',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@latestAcademicDegree',
        'as' => 'solicitud.generated::cemdY92SlsN9bwPt',
        'namespace' => NULL,
        'prefix' => '/solicitud',
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
    'solicitud.generated::mX25EbjjzWD6wjdd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/updateAcademicDegree',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateAcademicDegree',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateAcademicDegree',
        'as' => 'solicitud.generated::mX25EbjjzWD6wjdd',
        'namespace' => NULL,
        'prefix' => '/solicitud',
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
    'solicitud.generated::L2dX1bNLeIAZ8DiP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/updateAcademicDegreeRequiredDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateAcademicDegreeRequiredDocument',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateAcademicDegreeRequiredDocument',
        'as' => 'solicitud.generated::L2dX1bNLeIAZ8DiP',
        'namespace' => NULL,
        'prefix' => '/solicitud',
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
    'solicitud.generated::kpsBC9mSrYTKaLtm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/updateWorkingExperience',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateWorkingExperience',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateWorkingExperience',
        'as' => 'solicitud.generated::kpsBC9mSrYTKaLtm',
        'namespace' => NULL,
        'prefix' => '/solicitud',
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
    'solicitud.generated::ZrrEH1y9yNPzLSjR' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/updateAppliantLanguage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateAppliantLanguage',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateAppliantLanguage',
        'as' => 'solicitud.generated::ZrrEH1y9yNPzLSjR',
        'namespace' => NULL,
        'prefix' => '/solicitud',
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
    'solicitud.generated::R06jMPMYfJvJZGZD' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/updateAppliantLanguageRequiredDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateAppliantLanguageRequiredDocument',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateAppliantLanguageRequiredDocument',
        'as' => 'solicitud.generated::R06jMPMYfJvJZGZD',
        'namespace' => NULL,
        'prefix' => '/solicitud',
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
    'solicitud.generated::dbxYmmBVCOhsJ9ZV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/updateScientificProduction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateScientificProduction',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateScientificProduction',
        'as' => 'solicitud.generated::dbxYmmBVCOhsJ9ZV',
        'namespace' => NULL,
        'prefix' => '/solicitud',
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
    'solicitud.generated::w57int9GDrfuHwig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/addScientificProductionAuthor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@addScientificProductionAuthor',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@addScientificProductionAuthor',
        'as' => 'solicitud.generated::w57int9GDrfuHwig',
        'namespace' => NULL,
        'prefix' => '/solicitud',
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
    'solicitud.generated::sMuQkmLISytoeMFL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/updateScientificProductionAuthor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateScientificProductionAuthor',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateScientificProductionAuthor',
        'as' => 'solicitud.generated::sMuQkmLISytoeMFL',
        'namespace' => NULL,
        'prefix' => '/solicitud',
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
    'solicitud.generated::II5zAJOfjwB0GLyf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/updateHumanCapital',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateHumanCapital',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateHumanCapital',
        'as' => 'solicitud.generated::II5zAJOfjwB0GLyf',
        'namespace' => NULL,
        'prefix' => '/solicitud',
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
      'uri' => 'solicitud/archives/{archive}/{type}/{name}',
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
        'prefix' => '/solicitud',
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
    'solicitud.generated::3iV1zNozrzSmkdqZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/sentEmailRecommendationLetter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@sentEmailRecommendationLetter',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@sentEmailRecommendationLetter',
        'as' => 'solicitud.generated::3iV1zNozrzSmkdqZ',
        'namespace' => NULL,
        'prefix' => '/solicitud',
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
      'uri' => 'entrevistas/calendario',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@calendario',
        'controller' => 'App\\Http\\Controllers\\InterviewController@calendario',
        'as' => 'entrevistas.calendario',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/programa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@programa',
        'controller' => 'App\\Http\\Controllers\\InterviewController@programa',
        'as' => 'entrevistas.programa',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/nuevaEntrevista',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@nuevaEntrevista',
        'controller' => 'App\\Http\\Controllers\\InterviewController@nuevaEntrevista',
        'as' => 'entrevistas.nuevaEntrevista',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/confirmInterview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@confirmInterview',
        'controller' => 'App\\Http\\Controllers\\InterviewController@confirmInterview',
        'as' => 'entrevistas.confirmInterview',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/reopenInterview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@reopenInterview',
        'controller' => 'App\\Http\\Controllers\\InterviewController@reopenInterview',
        'as' => 'entrevistas.reopenInterview',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/deleteInterview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@deleteInterview',
        'controller' => 'App\\Http\\Controllers\\InterviewController@deleteInterview',
        'as' => 'entrevistas.deleteInterview',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/interviewUser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@newInterviewUser',
        'controller' => 'App\\Http\\Controllers\\InterviewController@newInterviewUser',
        'as' => 'entrevistas.interviewUser',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/interviewUser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@removeInterviewUser',
        'controller' => 'App\\Http\\Controllers\\InterviewController@removeInterviewUser',
        'as' => 'entrevistas.interviewUserDelete',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/rubrica/{evaluationRubric}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'uses' => 'App\\Http\\Controllers\\EvaluationRubricController@show',
        'controller' => 'App\\Http\\Controllers\\EvaluationRubricController@show',
        'as' => 'entrevistas.rubrica.show',
        'namespace' => NULL,
        'prefix' => 'entrevistas/rubrica',
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
      'uri' => 'entrevistas/rubrica/{evaluationRubric}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'uses' => 'App\\Http\\Controllers\\EvaluationRubricController@update',
        'controller' => 'App\\Http\\Controllers\\EvaluationRubricController@update',
        'as' => 'entrevistas.rubrica.update',
        'namespace' => NULL,
        'prefix' => 'entrevistas/rubrica',
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
      'uri' => 'entrevistas/rubrica/{evaluationRubric}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'uses' => 'App\\Http\\Controllers\\EvaluationRubricController@destroy',
        'controller' => 'App\\Http\\Controllers\\EvaluationRubricController@destroy',
        'as' => 'entrevistas.rubrica.destroy',
        'namespace' => NULL,
        'prefix' => 'entrevistas/rubrica',
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
      'uri' => 'entrevistas/periods',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'as' => 'entrevistas.periods.index',
        'uses' => 'App\\Http\\Controllers\\PeriodController@index',
        'controller' => 'App\\Http\\Controllers\\PeriodController@index',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/periods',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'as' => 'entrevistas.periods.store',
        'uses' => 'App\\Http\\Controllers\\PeriodController@store',
        'controller' => 'App\\Http\\Controllers\\PeriodController@store',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/periods/{period}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'as' => 'entrevistas.periods.show',
        'uses' => 'App\\Http\\Controllers\\PeriodController@show',
        'controller' => 'App\\Http\\Controllers\\PeriodController@show',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/periods/{period}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'as' => 'entrevistas.periods.update',
        'uses' => 'App\\Http\\Controllers\\PeriodController@update',
        'controller' => 'App\\Http\\Controllers\\PeriodController@update',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/periods/{period}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'as' => 'entrevistas.periods.destroy',
        'uses' => 'App\\Http\\Controllers\\PeriodController@destroy',
        'controller' => 'App\\Http\\Controllers\\PeriodController@destroy',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/zoom',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'as' => 'entrevistas.zoom.index',
        'uses' => 'ZoomController@index',
        'controller' => 'ZoomController@index',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/zoom',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'as' => 'entrevistas.zoom.store',
        'uses' => 'ZoomController@store',
        'controller' => 'ZoomController@store',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/zoom/{zoom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'as' => 'entrevistas.zoom.show',
        'uses' => 'ZoomController@show',
        'controller' => 'ZoomController@show',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/zoom/{zoom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'as' => 'entrevistas.zoom.update',
        'uses' => 'ZoomController@update',
        'controller' => 'ZoomController@update',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'entrevistas/zoom/{zoom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb',
        ),
        'as' => 'entrevistas.zoom.destroy',
        'uses' => 'ZoomController@destroy',
        'controller' => 'ZoomController@destroy',
        'namespace' => NULL,
        'prefix' => '/entrevistas',
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
      'uri' => 'admin',
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
        'prefix' => '/admin',
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
      'uri' => 'admin/workers',
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
        'prefix' => '/admin',
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
      'uri' => 'admin/newWorker',
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
        'prefix' => '/admin',
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
      'uri' => 'recommendationLetter/show/{token}',
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
        'prefix' => '/recommendationLetter',
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
      'uri' => 'recommendationLetter/addRecommendationLetter',
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
        'prefix' => '/recommendationLetter',
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
      'uri' => 'recommendationLetter/pruebaPDF',
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
        'prefix' => '/recommendationLetter',
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
    'generated::kPQXAIjon3z1ucWh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pruebaRegistro',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@pruebaRegistro',
        'controller' => 'App\\Http\\Controllers\\AdminController@pruebaRegistro',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::kPQXAIjon3z1ucWh',
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
