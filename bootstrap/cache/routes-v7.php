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
            '_route' => 'generated::is9AT7Tv8NcqEZ5s',
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
            '_route' => 'generated::BAwaMlsqZQnZ0TbQ',
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
            '_route' => 'generated::W1xxcDIqG3RP3TQH',
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
    ),
    2 => 
    array (
      0 => '{^(?|/_debugbar/c(?|lockwork/([^/]++)(*:39)|ache/([^/]++)(?:/([^/]++))?(*:73))|/downloadLetterCommitment/([^/]++)/([^/]++)/([^/]++)(*:133)|/controlescolar/(?|auth/([^/]++)(*:173)|prueba/([^/]++)(*:196)|solicitud/(?|([^/]++)(*:225)|expediente/([^/]++)(*:252)|update(?|Motivation(*:279)|Archive(?|PersonalDocument(*:313)|EntranceDocument(*:337)))|([^/]++)/latestAcademicDegree(*:376)|add(?|A(?|cademicDegree(*:407)|ppliantLanguage(*:430))|WorkingExperience(*:456)|ScientificProduction(?|(*:487)|Author(*:501))|HumanCapital(*:522))|delete(?|A(?|cademicDegree(*:557)|ppliantLanguage(*:580))|WorkingExperience(*:606)|ScientificProduction(*:634)|HumanCapital(*:654))|update(?|A(?|cademicDegree(?|(*:692)|RequiredDocument(*:716))|ppliantLanguage(?|(*:743)|RequiredDocument(*:767)))|WorkingExperience(*:794)|ScientificProduction(?|(*:825)|Author(*:839))|HumanCapital(*:860))|expediente/archives/([^/]++)/([^/]++)/([^/]++)(*:915)|sentEmailRecommendationLetter(*:952))|entrevistas/(?|rubrica/([^/]++)(?|(*:995))|periods/([^/]++)(?|(*:1023))|zoom/([^/]++)(?|(*:1049)))|recommendationLetter/show/([^/]++)(*:1094)))/?$}sDu',
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
            '_route' => 'generated::OWIHR08HegnRq4BM',
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
      252 => 
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
      279 => 
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
      313 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::BmerejaJJJn6eP6z',
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
      337 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::xqmugJfQRaQRc6kW',
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
      376 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::Ixx0lUj6buazTHkn',
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
      407 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::e30jyTCpTE75M3Fa',
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
      430 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::zyoqonHDvJ4vev8A',
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
      456 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::UCqPahLNkDucOvcY',
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
      487 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::lkwxVsSkGLpNdNNB',
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
      501 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::jVVHPtpazsBDXqFo',
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
      522 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::qEpkcxiULyXuaEEa',
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
      557 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::wGbsrpkBpfhu2dew',
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
      580 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::WB6Y1hndCeYvpo0H',
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
      606 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::6IyGk0V7kbepKVs6',
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
      634 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::0g8TGv3oF9SY9LoI',
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
      654 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::zcqm8t0zaCTdnvsJ',
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
      692 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::Y7YG155c8RRlJmvO',
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
      716 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::5ViogsbcZFZeS2Yi',
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
      743 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::ReLECpfozjDzUkCE',
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
      767 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::cmRuq7LC1mzs1Tai',
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
      794 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::pl7SpcX1BtcLGzFn',
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
      825 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::BizDblNfLDTfLbfy',
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
      839 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::hoCrdECNuqfpMfym',
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
      860 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::4MDMD8zCfv5vuenx',
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
      915 => 
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
      952 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.generated::UqmURW9D9oqxB8br',
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
      995 => 
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
      1023 => 
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
      1049 => 
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
      1094 => 
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
    'generated::is9AT7Tv8NcqEZ5s' => 
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
        'as' => 'generated::is9AT7Tv8NcqEZ5s',
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
    'generated::BAwaMlsqZQnZ0TbQ' => 
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000568c9aa30000000054096e6d";}";s:4:"hash";s:44:"tH9SZ3WlALKXZuB/HIylSTmFQlirDQWvbSuhJ3pKqiY=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::BAwaMlsqZQnZ0TbQ',
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
    'generated::W1xxcDIqG3RP3TQH' => 
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
        'as' => 'generated::W1xxcDIqG3RP3TQH',
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
    'generated::OWIHR08HegnRq4BM' => 
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
        'as' => 'generated::OWIHR08HegnRq4BM',
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
    'solicitud.generated::BmerejaJJJn6eP6z' => 
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
        'as' => 'solicitud.generated::BmerejaJJJn6eP6z',
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
    'solicitud.generated::xqmugJfQRaQRc6kW' => 
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
        'as' => 'solicitud.generated::xqmugJfQRaQRc6kW',
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
    'solicitud.generated::Ixx0lUj6buazTHkn' => 
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
        'as' => 'solicitud.generated::Ixx0lUj6buazTHkn',
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
    'solicitud.generated::e30jyTCpTE75M3Fa' => 
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
        'as' => 'solicitud.generated::e30jyTCpTE75M3Fa',
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
    'solicitud.generated::wGbsrpkBpfhu2dew' => 
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
        'as' => 'solicitud.generated::wGbsrpkBpfhu2dew',
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
    'solicitud.generated::Y7YG155c8RRlJmvO' => 
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
        'as' => 'solicitud.generated::Y7YG155c8RRlJmvO',
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
    'solicitud.generated::5ViogsbcZFZeS2Yi' => 
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
        'as' => 'solicitud.generated::5ViogsbcZFZeS2Yi',
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
    'solicitud.generated::UCqPahLNkDucOvcY' => 
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
        'as' => 'solicitud.generated::UCqPahLNkDucOvcY',
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
    'solicitud.generated::6IyGk0V7kbepKVs6' => 
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
        'as' => 'solicitud.generated::6IyGk0V7kbepKVs6',
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
    'solicitud.generated::pl7SpcX1BtcLGzFn' => 
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
        'as' => 'solicitud.generated::pl7SpcX1BtcLGzFn',
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
    'solicitud.generated::zyoqonHDvJ4vev8A' => 
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
        'as' => 'solicitud.generated::zyoqonHDvJ4vev8A',
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
    'solicitud.generated::WB6Y1hndCeYvpo0H' => 
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
        'as' => 'solicitud.generated::WB6Y1hndCeYvpo0H',
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
    'solicitud.generated::ReLECpfozjDzUkCE' => 
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
        'as' => 'solicitud.generated::ReLECpfozjDzUkCE',
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
    'solicitud.generated::cmRuq7LC1mzs1Tai' => 
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
        'as' => 'solicitud.generated::cmRuq7LC1mzs1Tai',
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
    'solicitud.generated::lkwxVsSkGLpNdNNB' => 
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
        'as' => 'solicitud.generated::lkwxVsSkGLpNdNNB',
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
    'solicitud.generated::0g8TGv3oF9SY9LoI' => 
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
        'as' => 'solicitud.generated::0g8TGv3oF9SY9LoI',
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
    'solicitud.generated::BizDblNfLDTfLbfy' => 
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
        'as' => 'solicitud.generated::BizDblNfLDTfLbfy',
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
    'solicitud.generated::jVVHPtpazsBDXqFo' => 
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
        'as' => 'solicitud.generated::jVVHPtpazsBDXqFo',
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
    'solicitud.generated::hoCrdECNuqfpMfym' => 
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
        'as' => 'solicitud.generated::hoCrdECNuqfpMfym',
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
    'solicitud.generated::qEpkcxiULyXuaEEa' => 
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
        'as' => 'solicitud.generated::qEpkcxiULyXuaEEa',
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
    'solicitud.generated::4MDMD8zCfv5vuenx' => 
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
        'as' => 'solicitud.generated::4MDMD8zCfv5vuenx',
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
    'solicitud.generated::zcqm8t0zaCTdnvsJ' => 
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
        'as' => 'solicitud.generated::zcqm8t0zaCTdnvsJ',
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
    'solicitud.generated::UqmURW9D9oqxB8br' => 
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
        'as' => 'solicitud.generated::UqmURW9D9oqxB8br',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
          2 => 'role:admin|control_escolar|profesor_nb',
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
  ),
)
);
