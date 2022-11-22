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
<<<<<<< HEAD
            '_route' => 'generated::aJe4DsKQX0TiwzGs',
=======
            '_route' => 'generated::NHFSvTbV9F0ryzSb',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
            '_route' => 'generated::4hoeXFUSX3fKEJRo',
=======
            '_route' => 'generated::NRwFsw28xI8ZPXdx',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
            '_route' => 'generated::2paalx1IIOxGD6T6',
=======
            '_route' => 'generated::RKzxKcL6vvMeg7Dx',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/ca' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ca.index',
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
      '/oldControlEscolar/listOldDocuments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oldControlEscolar.listOldDocuments',
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
      '/oldControlEscolar/listOldDocumentsIMAREC' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oldControlEscolar.listOldDocumentsIMAREC',
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
      '/nuevoExpediente/showCreateNewArchive' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'nuevoExpediente.showCreateNewArchive',
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
      '/nuevoExpediente/createArchive' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'nuevoExpediente.createArchive',
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
      '/showRegisterArchives' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'showRegisterArchives',
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
      '/solicitud/getFlagImage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.getFlagImage',
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
      '/solicitud/getButtonImage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.getButtonImage',
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
      '/solicitud/getAllButtonImage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.getAllButtonImage',
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
      '/solicitud/getImageAcademicProgram' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.getImageAcademicProgram',
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
      '/solicitud/archives/professor' => 
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
      '/solicitud/updateStatusArchive' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.updateStatus',
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
      '/solicitud/sentEmailToUpdateDocuments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.sentEmailToUpdateDocuments',
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
      '/solicitud/sentEmailRechazadoPostulacion' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.sentEmailRechazado',
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
      '/solicitud/whoModifyArchive' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.whoModifyArchive',
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
      '/solicitud/getEntranceRequiredDocuments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.getEntranceRequiredDocuments',
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
      '/solicitud/getExanniScore' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.getExanniScore',
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
      '/solicitud/updateExanniScore' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.',
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
      '/solicitud/updateMotivation' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::l9lEudo8LIVwIOoo',
=======
            '_route' => 'solicitud.generated::WubdUpRpq9mfNOGA',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/getPersonalRequiredDocuments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'solicitud.getPersonalRequiredDocuments',
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
      '/solicitud/updateArchivePersonalDocument' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::7VqihtPi0cjsbbZ2',
=======
            '_route' => 'solicitud.generated::UmNBSsFnIxzkLLw9',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/updateArchiveEntranceDocument' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::VHd4xsqILqWKgpyE',
=======
            '_route' => 'solicitud.generated::7VUa2PEhpbIGi4sC',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/addAcademicDegree' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::BQkXCTkz0ttsaIXx',
=======
            '_route' => 'solicitud.generated::l1uFFEz2RleoXnWr',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/deleteAcademicDegree' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::xLgCYbvmD2Ar2OJr',
=======
            '_route' => 'solicitud.generated::NW9qFOuSzlXhD0XB',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/updateAcademicDegree' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::J4JxqmklnNYJVzt4',
=======
            '_route' => 'solicitud.generated::1MV1qoGmWIpBnQSn',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/updateAcademicDegreeRequiredDocument' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::Avv1VSPhoHSjqyAk',
=======
            '_route' => 'solicitud.generated::seceSVBocHpl2Mem',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/addWorkingExperience' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::6bU88zdCV3Q6OQbW',
=======
            '_route' => 'solicitud.generated::5Jdn5k31wiLSvoto',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/deleteWorkingExperience' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::4dHNqdusNdKh0hOR',
=======
            '_route' => 'solicitud.generated::xU4Gb3SWlUagOIc6',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/updateWorkingExperience' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::oecA0c0vbE4Xmsug',
=======
            '_route' => 'solicitud.generated::F3Yp007wbj9JRmk7',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/addAppliantLanguage' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::ntyTuFHfq3nxaigR',
=======
            '_route' => 'solicitud.generated::R5sY9YW60KUOWh28',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/deleteAppliantLanguage' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::rfMvDh6iB1ihwKFK',
=======
            '_route' => 'solicitud.generated::gOSLLW3oOjZmBP6Z',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/updateAppliantLanguage' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::Uu2pVRSKJsERzGOG',
=======
            '_route' => 'solicitud.generated::r54XPbqZ3sY4Jjrh',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/updateAppliantLanguageRequiredDocument' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::lKVkNWM5XQu2CXsp',
=======
            '_route' => 'solicitud.generated::7XfjneFCy9fUKlnC',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/addScientificProduction' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::2K7Rb6X5HnTM4uP7',
=======
            '_route' => 'solicitud.generated::rdf5mNIvZZ6vml5T',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/deleteScientificProduction' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::kwocC7UDJtwDZB15',
=======
            '_route' => 'solicitud.generated::qSqwhsiyF3dy65SI',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/updateScientificProduction' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::SOVZPNLkU3oxBew1',
=======
            '_route' => 'solicitud.generated::LAyVdAcjDnGCsiZ0',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/addScientificProductionAuthor' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::DeOvZaiEQ5hjHSoI',
=======
            '_route' => 'solicitud.generated::xLm2wHlv8F4YrAHS',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/updateScientificProductionAuthor' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::1TjFoaw7utzu1He7',
=======
            '_route' => 'solicitud.generated::z5uhymY3F1wrSmqD',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/deleteScientificProductionAuthor' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::AvUkad5J30Tk9J2k',
=======
            '_route' => 'solicitud.generated::nO9gyMmcRdHxeohk',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/addHumanCapital' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::Y7DQn2RrCHCRNm3i',
=======
            '_route' => 'solicitud.generated::unE4eQu7B7RAkeuI',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/updateHumanCapital' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::UoOPhE3ekte1aoLs',
=======
            '_route' => 'solicitud.generated::WmExs4Zz0ygy0EWK',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/deleteHumanCapital' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::hjShDBdS9Xu0uaGb',
=======
            '_route' => 'solicitud.generated::PhPJizwp8IXziIkx',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/solicitud/sentEmailRecommendationLetter' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::07LyZsvqYi9vLWaj',
=======
            '_route' => 'solicitud.generated::0BNGgk7ZH8qpj85w',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/entrevistas/getFilteredInterviews' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.getFilteredInterviews',
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
      '/entrevistas/SendMailUpdateOnlyDocumentsForInterview' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.SendMailUpdateOnlyDocumentsForInterview',
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
      '/admin/updateWorker' => 
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
      '/admin/deleteWorker' => 
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
      '/updateDocuments/updateArchivePersonalDocument' => 
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
      '/updateDocuments/updateArchiveEntranceDoca ument' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'updateDocuments.generated::TFp6xJQeiyd8icAG',
=======
            '_route' => 'updateDocuments.generated::6ny83511VpnXdDP9',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/updateDocuments/updateAcademicDegreeRequiredDocument' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'updateDocuments.generated::DGHTIa0q2Yo889Ug',
=======
            '_route' => 'updateDocuments.generated::gRcgtfxk1Zjn3Fyw',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/updateDocuments/updateAppliantLanguageRequiredDocument' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'updateDocuments.generated::NkkwMi0Hs0YrB9wJ',
=======
            '_route' => 'updateDocuments.generated::msOindQmmO71hPEn',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/updateDocuments/updateArchiveInterviewDocument' => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'updateDocuments.generated::TKOmLKxMZT5sySEx',
=======
            '_route' => 'updateDocuments.generated::FccH4AnKyom3ePr1',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      '/updateDocuments/updateStatusArchive' => 
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
      '/recommendationLetter/userCanSeeAnswered' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'recommendationLetter.userCanSeeAnswered',
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
    ),
    2 => 
    array (
      0 => '{^(?|/_debugbar/c(?|lockwork/([^/]++)(*:39)|ache/([^/]++)(?:/([^/]++))?(*:73))|/do(?|wnloadLetterCommitment/([^/]++)/([^/]++)/([^/]++)(*:136)|cumentsForInterview/show/([^/]++)(*:177))|/oldControlEscolar/viewOldDocument(?|/([^/]++)/database/([^/]++)(*:250)|IMAREC/idSolicitud/([^/]++)/idTipoArchivo/([^/]++)/database/([^/]++)(*:326))|/auth/([^/]++)(*:349)|/prueba/([^/]++)(*:373)|/solicitud/(?|interview/([^/]++)(*:413)|expediente/([^/]++)(*:440)|([^/]++)/latestAcademicDegree(*:477)|expediente/archives/([^/]++)/([^/]++)/([^/]++)(*:531)|seeAnsweredRecommendationLetter/([^/]++)/([^/]++)(*:588))|/entrevistas/(?|rubrica/(?|([^/]++)(*:632)|promedio/(?|([^/]++)(*:660)|ca/([^/]++)(*:679)|([^/]++)/export(*:702))|([^/]++)(?|(*:722)))|periods/([^/]++)(?|(*:751))|zoom/([^/]++)(?|(*:776)))|/updateDocuments/show/([^/]++)/([^/]++)/([^/]++)/([^/]++)/([^/]++)/([^/]++)(?|(*:864)|/archives/([^/]++)/([^/]++)/([^/]++)(*:908))|/recommendationLetter/show/([^/]++)(*:952))/?$}sDu',
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
      136 => 
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
      177 => 
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
      250 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oldControlEscolar.viewOldDocument',
          ),
          1 => 
          array (
            0 => 'idDocumento',
            1 => 'nameDatabase',
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
      326 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oldControlEscolar.viewOldDocumentIMAREC',
          ),
          1 => 
          array (
            0 => 'idSolicitud',
            1 => 'idTipoArchivo',
            2 => 'nameDatabase',
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
      349 => 
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
      373 => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'generated::vEEr4NrwbiMmPhQM',
=======
            '_route' => 'generated::HEJ9Qwbvbpqbx8Fs',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      413 => 
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
      440 => 
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
      477 => 
      array (
        0 => 
        array (
          0 => 
          array (
<<<<<<< HEAD
            '_route' => 'solicitud.generated::3oi4koMmjhMJzaE7',
=======
            '_route' => 'solicitud.generated::edskfQEV11wbVYo4',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      531 => 
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
      588 => 
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
      632 => 
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
      660 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.rubrica.show_average',
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
      679 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.rubrica.show_average_ca',
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
      702 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'entrevistas.rubrica.export_rubric',
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
          5 => false,
          6 => NULL,
        ),
      ),
      722 => 
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
      751 => 
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
      776 => 
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
      864 => 
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
      908 => 
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
      952 => 
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
<<<<<<< HEAD
    'generated::aJe4DsKQX0TiwzGs' => 
=======
    'generated::NHFSvTbV9F0ryzSb' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
        'as' => 'generated::aJe4DsKQX0TiwzGs',
=======
        'as' => 'generated::NHFSvTbV9F0ryzSb',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'generated::4hoeXFUSX3fKEJRo' => 
=======
    'generated::NRwFsw28xI8ZPXdx' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000004c0407840000000058e605e0";}";s:4:"hash";s:44:"nGe1KbIlIeFLRuGyI8eEp00trgK10KMSi6kzKLdBCAs=";}}',
=======
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000031bbdf1b00000000086a11fe";}";s:4:"hash";s:44:"1I3+WC8shM/R0SIQqw0hlx1gStDT6ygu0seas2fx70s=";}}',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
<<<<<<< HEAD
        'as' => 'generated::4hoeXFUSX3fKEJRo',
=======
        'as' => 'generated::NRwFsw28xI8ZPXdx',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'generated::2paalx1IIOxGD6T6' => 
=======
    'generated::RKzxKcL6vvMeg7Dx' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
        'as' => 'generated::2paalx1IIOxGD6T6',
=======
        'as' => 'generated::RKzxKcL6vvMeg7Dx',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
    'ca.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ca',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ComiteAcademicoController@index',
        'controller' => 'App\\Http\\Controllers\\ComiteAcademicoController@index',
        'as' => 'ca.index',
        'namespace' => NULL,
        'prefix' => '/ca',
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
    'oldControlEscolar.listOldDocuments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oldControlEscolar/listOldDocuments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\OldDocumentController@listOldDocuments',
        'controller' => 'App\\Http\\Controllers\\OldDocumentController@listOldDocuments',
        'as' => 'oldControlEscolar.listOldDocuments',
        'namespace' => NULL,
        'prefix' => '/oldControlEscolar',
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
    'oldControlEscolar.listOldDocumentsIMAREC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oldControlEscolar/listOldDocumentsIMAREC',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\OldDocumentController@listOldDocumentsIMAREC',
        'controller' => 'App\\Http\\Controllers\\OldDocumentController@listOldDocumentsIMAREC',
        'as' => 'oldControlEscolar.listOldDocumentsIMAREC',
        'namespace' => NULL,
        'prefix' => '/oldControlEscolar',
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
    'oldControlEscolar.viewOldDocument' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oldControlEscolar/viewOldDocument/{idDocumento}/database/{nameDatabase}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\OldDocumentController@viewOldDocument',
        'controller' => 'App\\Http\\Controllers\\OldDocumentController@viewOldDocument',
        'as' => 'oldControlEscolar.viewOldDocument',
        'namespace' => NULL,
        'prefix' => '/oldControlEscolar',
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
    'oldControlEscolar.viewOldDocumentIMAREC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oldControlEscolar/viewOldDocumentIMAREC/idSolicitud/{idSolicitud}/idTipoArchivo/{idTipoArchivo}/database/{nameDatabase}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\OldDocumentController@viewOldDocumentIMAREC',
        'controller' => 'App\\Http\\Controllers\\OldDocumentController@viewOldDocumentIMAREC',
        'as' => 'oldControlEscolar.viewOldDocumentIMAREC',
        'namespace' => NULL,
        'prefix' => '/oldControlEscolar',
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
<<<<<<< HEAD
    'generated::vEEr4NrwbiMmPhQM' => 
=======
    'generated::HEJ9Qwbvbpqbx8Fs' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'prueba/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@testLogin',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@testLogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
<<<<<<< HEAD
        'as' => 'generated::vEEr4NrwbiMmPhQM',
=======
        'as' => 'generated::HEJ9Qwbvbpqbx8Fs',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
    'nuevoExpediente.showCreateNewArchive' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nuevoExpediente/showCreateNewArchive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@showCreateNewArchive',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@showCreateNewArchive',
        'as' => 'nuevoExpediente.showCreateNewArchive',
        'namespace' => NULL,
        'prefix' => '/nuevoExpediente',
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
    'nuevoExpediente.createArchive' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'nuevoExpediente/createArchive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@createArchive',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@createArchive',
        'as' => 'nuevoExpediente.createArchive',
        'namespace' => NULL,
        'prefix' => '/nuevoExpediente',
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
    'showRegisterArchives' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'showRegisterArchives',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@showRegisterArchives',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@showRegisterArchives',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'showRegisterArchives',
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
    'solicitud.getFlagImage' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'solicitud/getFlagImage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ImageController@getFlagImage',
        'controller' => 'App\\Http\\Controllers\\ImageController@getFlagImage',
        'as' => 'solicitud.getFlagImage',
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
    'solicitud.getButtonImage' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'solicitud/getButtonImage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ImageController@getButtonImage',
        'controller' => 'App\\Http\\Controllers\\ImageController@getButtonImage',
        'as' => 'solicitud.getButtonImage',
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
    'solicitud.getAllButtonImage' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'solicitud/getAllButtonImage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ImageController@getAllButtonImage',
        'controller' => 'App\\Http\\Controllers\\ImageController@getAllButtonImage',
        'as' => 'solicitud.getAllButtonImage',
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
    'solicitud.getImageAcademicProgram' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'solicitud/getImageAcademicProgram',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ImageController@getImageAcademicProgram',
        'controller' => 'App\\Http\\Controllers\\ImageController@getImageAcademicProgram',
        'as' => 'solicitud.getImageAcademicProgram',
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
    'solicitud.archivesProfessor' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'solicitud/archives/professor',
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
    'solicitud.showInterview' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'solicitud/interview/{archive}',
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
    'solicitud.updateStatus' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/updateStatusArchive',
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
    'solicitud.sentEmailToUpdateDocuments' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/sentEmailToUpdateDocuments',
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
    'solicitud.sentEmailRechazado' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/sentEmailRechazadoPostulacion',
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
    'solicitud.whoModifyArchive' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/whoModifyArchive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@whoModifyArchive',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@whoModifyArchive',
        'as' => 'solicitud.whoModifyArchive',
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
      'uri' => 'solicitud/expediente/{archive}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@appliantArchive',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@appliantArchive',
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
    'solicitud.getEntranceRequiredDocuments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'solicitud/getEntranceRequiredDocuments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@getEntranceRequiredDocuments',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@getEntranceRequiredDocuments',
        'as' => 'solicitud.getEntranceRequiredDocuments',
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
    'solicitud.getExanniScore' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'solicitud/getExanniScore',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@getExanniScore',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@getExanniScore',
        'as' => 'solicitud.getExanniScore',
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
      'uri' => 'solicitud/updateExanniScore',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateExanniScore',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateExanniScore',
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
<<<<<<< HEAD
    'solicitud.generated::l9lEudo8LIVwIOoo' => 
=======
    'solicitud.generated::WubdUpRpq9mfNOGA' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
        'as' => 'solicitud.generated::l9lEudo8LIVwIOoo',
=======
        'as' => 'solicitud.generated::WubdUpRpq9mfNOGA',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
    'solicitud.getPersonalRequiredDocuments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'solicitud/getPersonalRequiredDocuments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@getPersonalRequiredDocuments',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@getPersonalRequiredDocuments',
        'as' => 'solicitud.getPersonalRequiredDocuments',
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
<<<<<<< HEAD
    'solicitud.generated::7VqihtPi0cjsbbZ2' => 
=======
    'solicitud.generated::UmNBSsFnIxzkLLw9' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
        'as' => 'solicitud.generated::7VqihtPi0cjsbbZ2',
=======
        'as' => 'solicitud.generated::UmNBSsFnIxzkLLw9',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::VHd4xsqILqWKgpyE' => 
=======
    'solicitud.generated::7VUa2PEhpbIGi4sC' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
        'as' => 'solicitud.generated::VHd4xsqILqWKgpyE',
=======
        'as' => 'solicitud.generated::7VUa2PEhpbIGi4sC',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::3oi4koMmjhMJzaE7' => 
=======
    'solicitud.generated::edskfQEV11wbVYo4' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
        'uses' => 'App\\Http\\Controllers\\AcademicDegreeController@latestAcademicDegree',
        'controller' => 'App\\Http\\Controllers\\AcademicDegreeController@latestAcademicDegree',
<<<<<<< HEAD
        'as' => 'solicitud.generated::3oi4koMmjhMJzaE7',
=======
        'as' => 'solicitud.generated::edskfQEV11wbVYo4',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::BQkXCTkz0ttsaIXx' => 
=======
    'solicitud.generated::l1uFFEz2RleoXnWr' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/addAcademicDegree',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\AcademicDegreeController@addAcademicDegree',
        'controller' => 'App\\Http\\Controllers\\AcademicDegreeController@addAcademicDegree',
<<<<<<< HEAD
        'as' => 'solicitud.generated::BQkXCTkz0ttsaIXx',
=======
        'as' => 'solicitud.generated::l1uFFEz2RleoXnWr',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::xLgCYbvmD2Ar2OJr' => 
=======
    'solicitud.generated::NW9qFOuSzlXhD0XB' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/deleteAcademicDegree',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\AcademicDegreeController@deleteAcademicDegree',
        'controller' => 'App\\Http\\Controllers\\AcademicDegreeController@deleteAcademicDegree',
<<<<<<< HEAD
        'as' => 'solicitud.generated::xLgCYbvmD2Ar2OJr',
=======
        'as' => 'solicitud.generated::NW9qFOuSzlXhD0XB',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::J4JxqmklnNYJVzt4' => 
=======
    'solicitud.generated::1MV1qoGmWIpBnQSn' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
        'uses' => 'App\\Http\\Controllers\\AcademicDegreeController@updateAcademicDegree',
        'controller' => 'App\\Http\\Controllers\\AcademicDegreeController@updateAcademicDegree',
<<<<<<< HEAD
        'as' => 'solicitud.generated::J4JxqmklnNYJVzt4',
=======
        'as' => 'solicitud.generated::1MV1qoGmWIpBnQSn',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::Avv1VSPhoHSjqyAk' => 
=======
    'solicitud.generated::seceSVBocHpl2Mem' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
        'uses' => 'App\\Http\\Controllers\\AcademicDegreeController@updateAcademicDegreeRequiredDocument',
        'controller' => 'App\\Http\\Controllers\\AcademicDegreeController@updateAcademicDegreeRequiredDocument',
<<<<<<< HEAD
        'as' => 'solicitud.generated::Avv1VSPhoHSjqyAk',
=======
        'as' => 'solicitud.generated::seceSVBocHpl2Mem',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::6bU88zdCV3Q6OQbW' => 
=======
    'solicitud.generated::5Jdn5k31wiLSvoto' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/addWorkingExperience',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\WorkingExperienceController@addWorkingExperience',
        'controller' => 'App\\Http\\Controllers\\WorkingExperienceController@addWorkingExperience',
<<<<<<< HEAD
        'as' => 'solicitud.generated::6bU88zdCV3Q6OQbW',
=======
        'as' => 'solicitud.generated::5Jdn5k31wiLSvoto',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::4dHNqdusNdKh0hOR' => 
=======
    'solicitud.generated::xU4Gb3SWlUagOIc6' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/deleteWorkingExperience',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\WorkingExperienceController@deleteWorkingExperience',
        'controller' => 'App\\Http\\Controllers\\WorkingExperienceController@deleteWorkingExperience',
<<<<<<< HEAD
        'as' => 'solicitud.generated::4dHNqdusNdKh0hOR',
=======
        'as' => 'solicitud.generated::xU4Gb3SWlUagOIc6',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::oecA0c0vbE4Xmsug' => 
=======
    'solicitud.generated::F3Yp007wbj9JRmk7' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
        'uses' => 'App\\Http\\Controllers\\WorkingExperienceController@updateWorkingExperience',
        'controller' => 'App\\Http\\Controllers\\WorkingExperienceController@updateWorkingExperience',
<<<<<<< HEAD
        'as' => 'solicitud.generated::oecA0c0vbE4Xmsug',
=======
        'as' => 'solicitud.generated::F3Yp007wbj9JRmk7',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::ntyTuFHfq3nxaigR' => 
=======
    'solicitud.generated::R5sY9YW60KUOWh28' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/addAppliantLanguage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\AppliantLanguageController@addAppliantLanguage',
        'controller' => 'App\\Http\\Controllers\\AppliantLanguageController@addAppliantLanguage',
<<<<<<< HEAD
        'as' => 'solicitud.generated::ntyTuFHfq3nxaigR',
=======
        'as' => 'solicitud.generated::R5sY9YW60KUOWh28',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::rfMvDh6iB1ihwKFK' => 
=======
    'solicitud.generated::gOSLLW3oOjZmBP6Z' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/deleteAppliantLanguage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\AppliantLanguageController@deleteAppliantLanguage',
        'controller' => 'App\\Http\\Controllers\\AppliantLanguageController@deleteAppliantLanguage',
<<<<<<< HEAD
        'as' => 'solicitud.generated::rfMvDh6iB1ihwKFK',
=======
        'as' => 'solicitud.generated::gOSLLW3oOjZmBP6Z',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::Uu2pVRSKJsERzGOG' => 
=======
    'solicitud.generated::r54XPbqZ3sY4Jjrh' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
        'uses' => 'App\\Http\\Controllers\\AppliantLanguageController@updateAppliantLanguage',
        'controller' => 'App\\Http\\Controllers\\AppliantLanguageController@updateAppliantLanguage',
<<<<<<< HEAD
        'as' => 'solicitud.generated::Uu2pVRSKJsERzGOG',
=======
        'as' => 'solicitud.generated::r54XPbqZ3sY4Jjrh',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::lKVkNWM5XQu2CXsp' => 
=======
    'solicitud.generated::7XfjneFCy9fUKlnC' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
        'uses' => 'App\\Http\\Controllers\\AppliantLanguageController@updateAppliantLanguageRequiredDocument',
        'controller' => 'App\\Http\\Controllers\\AppliantLanguageController@updateAppliantLanguageRequiredDocument',
<<<<<<< HEAD
        'as' => 'solicitud.generated::lKVkNWM5XQu2CXsp',
=======
        'as' => 'solicitud.generated::7XfjneFCy9fUKlnC',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::2K7Rb6X5HnTM4uP7' => 
=======
    'solicitud.generated::rdf5mNIvZZ6vml5T' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/addScientificProduction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ScientificProductionController@addScientificProduction',
        'controller' => 'App\\Http\\Controllers\\ScientificProductionController@addScientificProduction',
<<<<<<< HEAD
        'as' => 'solicitud.generated::2K7Rb6X5HnTM4uP7',
=======
        'as' => 'solicitud.generated::rdf5mNIvZZ6vml5T',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::kwocC7UDJtwDZB15' => 
=======
    'solicitud.generated::qSqwhsiyF3dy65SI' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/deleteScientificProduction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ScientificProductionController@deleteScientificProduction',
        'controller' => 'App\\Http\\Controllers\\ScientificProductionController@deleteScientificProduction',
<<<<<<< HEAD
        'as' => 'solicitud.generated::kwocC7UDJtwDZB15',
=======
        'as' => 'solicitud.generated::qSqwhsiyF3dy65SI',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::SOVZPNLkU3oxBew1' => 
=======
    'solicitud.generated::LAyVdAcjDnGCsiZ0' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
        'uses' => 'App\\Http\\Controllers\\ScientificProductionController@updateScientificProduction',
        'controller' => 'App\\Http\\Controllers\\ScientificProductionController@updateScientificProduction',
<<<<<<< HEAD
        'as' => 'solicitud.generated::SOVZPNLkU3oxBew1',
=======
        'as' => 'solicitud.generated::LAyVdAcjDnGCsiZ0',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::DeOvZaiEQ5hjHSoI' => 
=======
    'solicitud.generated::xLm2wHlv8F4YrAHS' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
        'uses' => 'App\\Http\\Controllers\\ScientificProductionController@addScientificProductionAuthor',
        'controller' => 'App\\Http\\Controllers\\ScientificProductionController@addScientificProductionAuthor',
<<<<<<< HEAD
        'as' => 'solicitud.generated::DeOvZaiEQ5hjHSoI',
=======
        'as' => 'solicitud.generated::xLm2wHlv8F4YrAHS',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::1TjFoaw7utzu1He7' => 
=======
    'solicitud.generated::z5uhymY3F1wrSmqD' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
        'uses' => 'App\\Http\\Controllers\\ScientificProductionController@updateScientificProductionAuthor',
        'controller' => 'App\\Http\\Controllers\\ScientificProductionController@updateScientificProductionAuthor',
<<<<<<< HEAD
        'as' => 'solicitud.generated::1TjFoaw7utzu1He7',
=======
        'as' => 'solicitud.generated::z5uhymY3F1wrSmqD',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::AvUkad5J30Tk9J2k' => 
=======
    'solicitud.generated::nO9gyMmcRdHxeohk' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/deleteScientificProductionAuthor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ScientificProductionController@deleteScientificProductionAuthor',
        'controller' => 'App\\Http\\Controllers\\ScientificProductionController@deleteScientificProductionAuthor',
<<<<<<< HEAD
        'as' => 'solicitud.generated::AvUkad5J30Tk9J2k',
=======
        'as' => 'solicitud.generated::nO9gyMmcRdHxeohk',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::Y7DQn2RrCHCRNm3i' => 
=======
    'solicitud.generated::unE4eQu7B7RAkeuI' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/addHumanCapital',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\HumanCapitalController@addHumanCapital',
        'controller' => 'App\\Http\\Controllers\\HumanCapitalController@addHumanCapital',
<<<<<<< HEAD
        'as' => 'solicitud.generated::Y7DQn2RrCHCRNm3i',
=======
        'as' => 'solicitud.generated::unE4eQu7B7RAkeuI',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::UoOPhE3ekte1aoLs' => 
=======
    'solicitud.generated::WmExs4Zz0ygy0EWK' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
        'uses' => 'App\\Http\\Controllers\\HumanCapitalController@updateHumanCapital',
        'controller' => 'App\\Http\\Controllers\\HumanCapitalController@updateHumanCapital',
<<<<<<< HEAD
        'as' => 'solicitud.generated::UoOPhE3ekte1aoLs',
=======
        'as' => 'solicitud.generated::WmExs4Zz0ygy0EWK',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
<<<<<<< HEAD
    'solicitud.generated::hjShDBdS9Xu0uaGb' => 
=======
    'solicitud.generated::PhPJizwp8IXziIkx' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'solicitud/deleteHumanCapital',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\HumanCapitalController@deleteHumanCapital',
        'controller' => 'App\\Http\\Controllers\\HumanCapitalController@deleteHumanCapital',
<<<<<<< HEAD
        'as' => 'solicitud.generated::hjShDBdS9Xu0uaGb',
=======
        'as' => 'solicitud.generated::PhPJizwp8IXziIkx',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
      'uri' => 'solicitud/expediente/archives/{archive}/{type}/{name}',
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
<<<<<<< HEAD
    'solicitud.generated::07LyZsvqYi9vLWaj' => 
=======
    'solicitud.generated::0BNGgk7ZH8qpj85w' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
        'uses' => 'App\\Http\\Controllers\\ExternalRecommendationLetter@sentEmailRecommendationLetter',
        'controller' => 'App\\Http\\Controllers\\ExternalRecommendationLetter@sentEmailRecommendationLetter',
<<<<<<< HEAD
        'as' => 'solicitud.generated::07LyZsvqYi9vLWaj',
=======
        'as' => 'solicitud.generated::0BNGgk7ZH8qpj85w',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
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
    'solicitud.seeAnswered' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'solicitud/seeAnsweredRecommendationLetter/{archive_id}/{rl_id}',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
    'entrevistas.getFilteredInterviews' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'entrevistas/getFilteredInterviews',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@getFilteredInterviews',
        'controller' => 'App\\Http\\Controllers\\InterviewController@getFilteredInterviews',
        'as' => 'entrevistas.getFilteredInterviews',
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
    'entrevistas.SendMailUpdateOnlyDocumentsForInterview' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'entrevistas/SendMailUpdateOnlyDocumentsForInterview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@SendMailUpdateOnlyDocumentsForInterview',
        'controller' => 'App\\Http\\Controllers\\InterviewController@SendMailUpdateOnlyDocumentsForInterview',
        'as' => 'entrevistas.SendMailUpdateOnlyDocumentsForInterview',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
    'entrevistas.rubrica.show_average' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'entrevistas/rubrica/promedio/{archive_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
          3 => 'role:admin|coordinador|control_escolar',
        ),
        'uses' => 'App\\Http\\Controllers\\EvaluationRubricController@show_average',
        'controller' => 'App\\Http\\Controllers\\EvaluationRubricController@show_average',
        'as' => 'entrevistas.rubrica.show_average',
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
    'entrevistas.rubrica.show_average_ca' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'entrevistas/rubrica/promedio/ca/{archive_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
          3 => 'role:admin|comite_academico',
        ),
        'uses' => 'App\\Http\\Controllers\\EvaluationRubricController@show_average_ca',
        'controller' => 'App\\Http\\Controllers\\EvaluationRubricController@show_average_ca',
        'as' => 'entrevistas.rubrica.show_average_ca',
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
    'entrevistas.rubrica.export_rubric' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'entrevistas/rubrica/promedio/{archive_id}/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
          3 => 'role:admin|comite_academico|coordinador|control_escolar',
        ),
        'uses' => 'App\\Http\\Controllers\\EvaluationRubricController@export_rubric',
        'controller' => 'App\\Http\\Controllers\\EvaluationRubricController@export_rubric',
        'as' => 'entrevistas.rubrica.export_rubric',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
          2 => 'role:admin|control_escolar|profesor_nb|comite_academico|coordinador',
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
    'admin.updateWorker' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/updateWorker',
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
    'admin.deleteWorker' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/deleteWorker',
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
    'updateDocuments.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'updateDocuments/show/{archive_id}/{personal_documents}/{entrance_documents}/{academic_documents}/{language_documents}/{working_documents}',
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
        'prefix' => '/updateDocuments',
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
      'uri' => 'updateDocuments/updateArchivePersonalDocument',
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
        'prefix' => '/updateDocuments',
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
<<<<<<< HEAD
    'updateDocuments.generated::TFp6xJQeiyd8icAG' => 
=======
    'updateDocuments.generated::6ny83511VpnXdDP9' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'updateDocuments/updateArchiveEntranceDoca ument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchiveController@updateArchiveEntranceDocument',
        'controller' => 'App\\Http\\Controllers\\ArchiveController@updateArchiveEntranceDocument',
<<<<<<< HEAD
        'as' => 'updateDocuments.generated::TFp6xJQeiyd8icAG',
=======
        'as' => 'updateDocuments.generated::6ny83511VpnXdDP9',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
        'namespace' => NULL,
        'prefix' => '/updateDocuments',
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
<<<<<<< HEAD
    'updateDocuments.generated::DGHTIa0q2Yo889Ug' => 
=======
    'updateDocuments.generated::gRcgtfxk1Zjn3Fyw' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'updateDocuments/updateAcademicDegreeRequiredDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AcademicDegreeController@updateAcademicDegreeRequiredDocument',
        'controller' => 'App\\Http\\Controllers\\AcademicDegreeController@updateAcademicDegreeRequiredDocument',
<<<<<<< HEAD
        'as' => 'updateDocuments.generated::DGHTIa0q2Yo889Ug',
=======
        'as' => 'updateDocuments.generated::gRcgtfxk1Zjn3Fyw',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
        'namespace' => NULL,
        'prefix' => '/updateDocuments',
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
<<<<<<< HEAD
    'updateDocuments.generated::NkkwMi0Hs0YrB9wJ' => 
=======
    'updateDocuments.generated::msOindQmmO71hPEn' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'updateDocuments/updateAppliantLanguageRequiredDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AppliantLanguageController@updateAppliantLanguageRequiredDocument',
        'controller' => 'App\\Http\\Controllers\\AppliantLanguageController@updateAppliantLanguageRequiredDocument',
<<<<<<< HEAD
        'as' => 'updateDocuments.generated::NkkwMi0Hs0YrB9wJ',
=======
        'as' => 'updateDocuments.generated::msOindQmmO71hPEn',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
        'namespace' => NULL,
        'prefix' => '/updateDocuments',
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
<<<<<<< HEAD
    'updateDocuments.generated::TKOmLKxMZT5sySEx' => 
=======
    'updateDocuments.generated::FccH4AnKyom3ePr1' => 
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'updateDocuments/updateArchiveInterviewDocument',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@updateArchiveInterviewDocument',
        'controller' => 'App\\Http\\Controllers\\InterviewController@updateArchiveInterviewDocument',
<<<<<<< HEAD
        'as' => 'updateDocuments.generated::TKOmLKxMZT5sySEx',
=======
        'as' => 'updateDocuments.generated::FccH4AnKyom3ePr1',
>>>>>>> fa21e7ceed4050836de46a95a0bfcae8da54faad
        'namespace' => NULL,
        'prefix' => '/updateDocuments',
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
      'uri' => 'updateDocuments/show/{archive_id}/{personal_documents}/{entrance_documents}/{academic_documents}/{language_documents}/{working_documents}/archives/{archive}/{type}/{name}',
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
        'prefix' => '/updateDocuments',
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
      'uri' => 'updateDocuments/updateStatusArchive',
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
        'prefix' => '/updateDocuments',
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
      'uri' => 'documentsForInterview/show/{archive_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\InterviewController@documentsForInterviewShow',
        'controller' => 'App\\Http\\Controllers\\InterviewController@documentsForInterviewShow',
        'as' => 'documentsForInterview.show',
        'namespace' => NULL,
        'prefix' => '/documentsForInterview',
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
    'recommendationLetter.userCanSeeAnswered' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'recommendationLetter/userCanSeeAnswered',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ExternalRecommendationLetter@userCanSeeAnswered',
        'controller' => 'App\\Http\\Controllers\\ExternalRecommendationLetter@userCanSeeAnswered',
        'as' => 'recommendationLetter.userCanSeeAnswered',
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
  ),
)
);
