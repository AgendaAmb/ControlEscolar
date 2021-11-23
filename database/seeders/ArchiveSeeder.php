<?php

namespace Database\Seeders;

use App\Helpers\MiPortalService;
use App\Helpers\OldSchoolControlService;
use App\Models\RequiredDocument;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ArchiveSeeder extends Seeder
{
    /**
     * Web service de mi portal
     */
    private $mi_portal_service;

    /**
     * Web service del sistema viejo
     */
    private $old_ce_service;

    /**
     * Gets the new appliant data.
     *
     * @return array
     */
    private function newModuleUserData($old_archive)
    {
        return [
            'module_id' => env('MIPORTAL_MODULE_ID'),
            'curp' => $old_archive['appliant_curp'],
            'pertenece_uaslp' => false,
            'email' => $old_archive['user']['email'] ?? 'pmpca@gmail.com',
            'altern_email' => $old_archive['user']['altern_email'] ?? 'escolar@pmpca.uaslp.mx',
            'password' => $old_archive['user']['password'],
            'rpassword' => $old_archive['user']['password'],
            'name' => $old_archive['user']['name'] ?? 'indefinido',
            'middlename' => $old_archive['user']['middlename'] ?? 'indefinido',
            'surname' => $old_archive['user']['surname'],
            'birth_date' => $old_archive['user']['birth_date'],
            'ocupation' => 'Estudiante',
            'gender' => $old_archive['user']['gender'],
            'nationality' => $old_archive['user']['birth_country'],
            'residence' => $old_archive['user']['residence_country'],
            'zip_code' => 78200,
            'phone_number' => $old_archive['user']['phone_number'],
            'is_disabled' => false,
        ];
    }

    /**
     * Creates a new archive.
     *
     * @return void
     */
    private function newArchive($new_appliant, $appliant, $old_archive)
    {
        # Crea un expediente nuevo.
        $new_archive = $new_appliant->archives()->firstOrCreate([
            'user_type' => $appliant['user_type'],
            'announcement_id' => isset($old_archive['academic_degrees'][0]['cvu']) ? 2 : 4,
            'status' => 1
        ]);

        # Asigna los grados académicos al expediente nuevo.
        $new_archive->academicDegrees()->updateOrCreate([
            'archive_id' => $new_archive->id
        ], $old_archive['academic_degrees'][0]);

        # Asigna las lenguas extranjeras al expediente nuevo.
        $new_archive->appliantLanguages()->updateOrCreate([
            'archive_id' => $new_archive->id
        ], $old_archive['appliant_languages'][0]);

        return $new_archive;
    }

    /**
     * Stores language documents.
     *
     * @return void
     */
    private function storePersonalDocuments($appliant, $old_archive, $new_archive)
    {
        # Arreglo con nombres transitivos de los documentos viejos
        # a los documentos nuevos.
        $transition_array = [
            '1.- Acta de nacimiento' => '1.- Acta de nacimiento',
            '2.- CURP expedido por la RENAPO' => '2.- CURP expedido por la RENAPO',
            '3.- INE en ampliación tamaño carta' => '3.- INE en ampliación tamaño carta',
        ];

        foreach ($old_archive['personal_documents'] as $file) {
            # Nombre del documento.
            $document_name = $transition_array[$file['name']] ?? null;

            # Busca el id del documento requerido, que tenga coincidencia con el nombre.
            $required_document_id = RequiredDocument::firstWhere('name', $document_name)->id ?? null;

            # En caso de no encontrarse, se va al siguiente documento.
            if ($required_document_id === null)
                continue;

            # Genera la ruta del documento probatorio.
            $path = implode('/', [
                'archives',
                $new_archive->id,
                'personalDocuments',
                $required_document_id . '.pdf'
            ]);

            # Guarda el nuevo documento probatorio y lo actualiza en el modelo de datos.
            Storage::put($path, base64_decode($file['Contenido']));

            $new_archive->requiredDocuments()->updateExistingPivot($required_document_id, [
                'location' => $path
            ]);
        }
    }

    /**
     * Stores language documents.
     *
     * @return void
     */
    private function storeLanguageDocuments($appliant, $old_archive, $new_archive)
    {
        # Arreglo con nombres transitivos de los documentos viejos
        # a los documentos nuevos.
        $transition_array = [
            '13.- Certificado de idioma vigente' => '13.- Certificado de idioma vigente',
        ];

        # Lenguaje del postulante.
        $appliant_language = $new_archive->appliantLanguages()->first();

        foreach ($old_archive['language_documents'] as $file) {
            # Nombre del documento.
            $document_name = $transition_array[$file['name']] ?? null;

            # Busca el id del documento requerido, que tenga coincidencia con el nombre.
            $required_document_id = RequiredDocument::firstWhere('name', $document_name)->id ?? null;

            # En caso de no encontrarse, se va al siguiente documento.
            if ($required_document_id === null)
                continue;

            # Genera la ruta del documento probatorio.
            $path = implode('/', [
                'archives',
                $new_archive->id,
                'languageDocuments',
                $appliant_language->id . '_' . $required_document_id . '.pdf'
            ]);

            # Guarda el nuevo documento probatorio y lo actualiza en el modelo de datos.
            Storage::put($path, base64_decode($file['Contenido']));

            $appliant_language->requiredDocuments()->updateExistingPivot($required_document_id, [
                'location' => $path
            ]);
        }
    }

    /**
     * Stores entrance documents.
     *
     * @return void
     */
    private function storeEntranceDocuments($appliant, $old_archive, $new_archive)
    {
        # Arreglo con nombres transitivos de los documentos viejos
        # a los documentos nuevos.
        $transition_array = [
            '12.- Resultados del EXANI III vigente (no aplica a estudiantes extranjeros)' => '12.- Resultados del EXANI III vigente (no aplica a estudiantes extranjeros)',
            '10.- Carta compromiso y manifestación de conocimientos' => '18.- Carta compromiso y de manifestación de lineamientos (firmada y escaneada)',
            '19.- Propuesta de proyecto avalada por el profesor postulante' => '19.- Propuesta de proyecto avalada por el profesor postulante'
        ];

        foreach ($old_archive['entrance_documents'] as $file) {
            # Nombre del documento.
            $document_name = $transition_array[$file['name']] ?? null;

            # Busca el id del documento requerido, que tenga coincidencia con el nombre.
            $required_document_id = RequiredDocument::firstWhere('name', $document_name)->id ?? null;

            # En caso de no encontrarse, se va al siguiente documento.
            if ($required_document_id === null)
                continue;

            # Genera la ruta del documento probatorio.
            $path = implode('/', [
                'archives',
                $new_archive->id,
                'entranceDocuments',
                $required_document_id . '.pdf'
            ]);

            # Guarda el nuevo documento probatorio y lo actualiza en el modelo de datos.
            Storage::put($path, base64_decode($file['Contenido']));

            $new_archive->requiredDocuments()->updateExistingPivot($required_document_id, [
                'location' => $path
            ]);
        }
    }

    /**
     * Stores entrance documents.
     
     * @return void
     */
    private function storeCurricularDocuments($appliant, $old_archive, $new_archive)
    {
        # Arreglo con documentos
        $documents = [
            '18A.- Carta de recomendación',
            '18B.- Carta de recomendación'
        ];

        # Índice
        $i = 0;

        foreach ($old_archive['entrance_documents'] as $file) {
            # Nombre del documento.
            $document_name = $file['name'];

            if ($document_name === '16.- Dos cartas de recomendación académica' && $i < 2) {
                # Busca el id del documento requerido, que tenga coincidencia con el nombre.
                $required_document_id = RequiredDocument::firstWhere('name', $documents[$i])->id ?? null;

                # En caso de no encontrarse, se va al siguiente documento.
                if ($required_document_id === null)
                    continue;

                # Genera la ruta del documento probatorio.
                $path = implode('/', [
                    'archives',
                    $new_archive->id,
                    'curricularDocuments',
                    $required_document_id . '.pdf'
                ]);

                # Guarda el nuevo documento probatorio y lo actualiza en el modelo de datos.
                Storage::put($path, base64_decode($file['Contenido']));

                $new_archive->requiredDocuments()->updateExistingPivot($required_document_id, [
                    'location' => $path
                ]);

                $i++;
            }
        }
    }

    /**
     * Stores entrance documents.
     *
     * @return void
     */
    private function storeAcademicDocuments($appliant, $old_archive, $new_archive)
    {
        # Arreglo con documentos
        $documents = [
            '5A.- Título de licenciatura o acta de examen' => '5B.- Título de licenciatura o acta de examen',
            '5B.- Título de maestría o acta de examen' => '5B.- Título de maestría o acta de examen',
            '6A.- Certificado de materias de la licenciatura' => '6A.- Certificado de materias de la licenciatura',
            '6B.- Certificado de materias de la maestría' => '6B.- Certificado de materias de la maestría',
            '7A.- Constancia de promedio de la licenciatura' => '7A.- Constancia de promedio de la licenciatura.',
            '7B.- Constancia de promedio de la maestría' => '7B.- Constancia de promedio de la maestría.',
            'Título de licenciatura o acta de examen o carta de pasante  (Solo aplica en IMaREC)' => '5A.- Título de licenciatura o acta de examen',
            '8A.- Cédula de la licenciatura' => '8A.- Cédula de la licenciatura',
            '8B.- Cédula de la maestría' => '8B.- Cédula de la maestría'
        ];

        # Lenguaje del postulante.
        $academic_degree = $new_archive->academicDegrees()->first();

        foreach ($old_archive['academic_documents'] as $file) {
            # Nombre del documento.
            $document_name =  $documents[$file['name']];

            # Busca el id del documento requerido, que tenga coincidencia con el nombre.
            $required_document_id = RequiredDocument::firstWhere('name', $document_name)->id ?? null;

            # En caso de no encontrarse, se va al siguiente documento.
            if ($required_document_id === null)
                continue;

            # Genera la ruta del documento probatorio.
            $path = implode('/', [
                'archives',
                $new_archive->id,
                'academicDocuments',
                $required_document_id . '.pdf'
            ]);

            # Guarda el nuevo documento probatorio y lo actualiza en el modelo de datos.
            Storage::put($path, base64_decode($file['Contenido']));

            $academic_degree->requiredDocuments()->updateExistingPivot($required_document_id, [
                'location' => $path
            ]);
        }
    }

    /**
     * Creates a new archive.
     *
     * @return void
     */
    private function storeOldDocuments($appliant, $old_archive, $new_archive)
    {
        $this->storePersonalDocuments($appliant, $old_archive, $new_archive);
        $this->storeAcademicDocuments($appliant, $old_archive, $new_archive);
        $this->storeLanguageDocuments($appliant, $old_archive, $new_archive);
        $this->storeEntranceDocuments($appliant, $old_archive, $new_archive);
        $this->storeCurricularDocuments($appliant, $old_archive, $new_archive);
        $this->storeIntentionLetter($appliant, $old_archive, $new_archive);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function migrateOldUsers($old_archives)
    {
        # Curp de usuarios viejos de control escolar.
        $curps = $old_archives->pluck('appliant_curp')->toArray();

        # Busca a los usuarios, que estén registrados en el
        # portal y tengan el módulo
        $response = $this->mi_portal_service->miPortalGet('api/usuarios', [
            'fields[users]' => 'id,type,curp',
            'filter[curp]' => $curps,
        ]);

        # Obtiene el curp de aquellos usuarios que estén registrados.
        $appliants = $response->collect();
        # Arreglo con los nuevos postulantes.
        $new_appliants = [];

        # Arreglo con los usuario, a los cuales se les asignará
        # un módulo.
        $new_module_users = [];

        # Crea un nuevo expediente (migra el expediente anterior) al sistema nuevo.
        foreach ($appliants as $appliant) {
            # Nuevo postulante o recupera una instancia previa.
            $new_appliant = User::firstOrCreate([
                'id' => $appliant['id'],
                'type' => $appliant['user_type'],
            ]);

            # El usuario creado es un nuevo postulante.
            if (!$new_appliant->hasRole('aspirante_local')) {
                $new_appliant->assignRole('aspirante_local');
                $new_appliants[] = $new_appliant;
            }

            # Busca el expediente viejo.
            $old_archive = $old_archives->firstWhere('appliant_curp', $appliant['curp']);

            # Continúa, en caso de que el expediente no exista.
            if ($old_archive === null)
                continue;

            # Crea un expediente nuevo.
            $new_archive = $this->newArchive($new_appliant, $appliant, $old_archive);

            # Guarda los documentos probatorios.
            $this->storeOldDocuments($appliant, $old_archive, $new_archive);

            # Añade un usuario al arreglo.
            $new_module_users[] = [
                'module_id' => env('MIPORTAL_MODULE_ID'),
                'user_id' => $appliant['id'],
                'user_type' => $appliant['user_type']
            ];
        }

        # Filtra aquellos expedientes, que no estén en el arreglo de nuevos 
        # postulantes.
        $cropped_archives = $old_archives
            ->whereNotIn('appliant_curp', collect($appliants)->pluck('curp')->toArray());

        # Agrega a cualquier nuevo usuario al módulo de control escolar.
        $this->mi_portal_service->miPortalPost('api/usuarios/modulos/storeMany', [
            'users' => $new_module_users
        ]);

        return $cropped_archives;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function migrateNewUsers($old_archives)
    {
        # Arreglo con los nuevos postulantes.
        $new_module_users = [];

        # Itera cada expediente viejo
        foreach ($old_archives as $old_archive)
            # Anade un expediente al arreglo.
            $new_module_users[] = $this->newModuleUserData($old_archive);

        # Consume un post masivo, por parte del portal.
        $response = $this->mi_portal_service->miPortalPost('api/usuarios/storeMany', [
            'users' => $new_module_users
        ]);

        if ($response->failed()) {
            dump($response->status());
            return;
        }

        # Obtiene el curp de aquellos usuarios que estén registrados.
        $this->migrateOldUsers($old_archives);
    }

    /**
     * Almacena las cartas de recomendación e intención
     */
    private function storeIntentionLetter($appliant, $old_archive, $new_archive)
    {
        # Arreglo con nombres transitivos de los documentos viejos
        # a los documentos nuevos.
        $transition_array = [
            '11.- Carta de intención de un profesor del núcleo básico (el profesor la envía directamente)'
            => '11.- Carta de intención de un profesor del núcleo básico (el profesor la envía directamente)',
        ];

        foreach ($old_archive['entrance_documents'] as $file) {
            # Nombre del documento.
            $document_name = $transition_array[$file['name']] ?? null;

            # Busca el id del documento requerido, que tenga coincidencia con el nombre.
            $required_document_id = RequiredDocument::firstWhere('name', $document_name)->id ?? null;

            # En caso de no encontrarse, se va al siguiente documento.
            if ($required_document_id === null)
                continue;

            # Genera la ruta del documento probatorio.
            $new_archive->createOrUpdateIntentionLetter(12457,  base64_decode($file['Contenido']));
        }
    }
    private function ReasigRecommentLetter()
    {

        $DavidBalderas = User::findorFail(102);
        $Expediente = $DavidBalderas->latestArchive;

        $Expediente->createRecommendationLetter(Storage::get('/public/DocumentoExtra/FormRecomendacion2021-signed.pdf'));

        $Madeleyne = User::findorFail(100);
        $Expediente = $Madeleyne->latestArchive;

        $Expediente->createRecommendationLetter(Storage::get('/public/DocumentoExtra/RecomendaciónCupido.pdf'));
        $Expediente->createRecommendationLetter(Storage::get('/public/DocumentoExtra/16_Recomendación_01_2021_CHM.pdf'));

        $AlmaG = User::findorFail(104);
        $Expediente = $AlmaG->latestArchive;

        $Expediente->createRecommendationLetter(Storage::get('/public/DocumentoExtra/16_Recomendacion_01_2021_MAAG.pdf'));

        $Hilda = User::findorFail(103);
        $Expediente = $Hilda->latestArchive;
        $Expediente->requiredDocuments()->attach(18, ['Location' => "/public/DocumentoExtra/Protocolo_Hilda_Guadalupe_Cisneros_Ontiveros_DoctoradoPMPCA.pdf"]);
        $Expediente->createRecommendationLetter(Storage::get('/public/DocumentoExtra/Carta_postulación_NAMC_FINAL.pdf'));
    }
    //**Metodo para descargar todos los archivos que se encuentran actualmente en el sistema antiguo. */
    //**No se enlazan a la estructura.*/
    private function downloadAllOldArchives($old_archives)
    {
        $count = 0;

        for ($i = 0; $i < count($old_archives); $i++) {
            if (isset($old_archives[$i]['personal_documents'])) {
               
                for ($j = 0; $j < count($old_archives[$i]['personal_documents']); $j++) {
                    //dd(count($old_archives[$i]['personal_documents']));
                    $path = implode('/', [
                        'archives',
                        $i,
                        'personalDocuments',
                        $j . '.pdf'
                    ]);

                    # Guarda el nuevo documento probatorio y lo actualiza en el modelo de datos.
                    Storage::put($path, base64_decode($old_archives[$i]['personal_documents'][$j]['Contenido']));
                }
            }


            if (isset($old_archives[$i]['academic_documents'])) {
                for ($j = 0; $j < count($old_archives[$i]['academic_documents']); $j++) {
                    //dd(count($old_archives[$i]['personal_documents']));
                    $path = implode('/', [
                        'archives',
                        $i,
                        'academic_documents',
                        $j . '.pdf'
                    ]);

                    # Guarda el nuevo documento probatorio y lo actualiza en el modelo de datos.
                    Storage::put($path, base64_decode($old_archives[$i]['academic_documents'][$j]['Contenido']));
                }
            } 
            if (isset($old_archives[$i]['entrance_documents'])) {
                for ($j = 0; $j < count($old_archives[$i]['entrance_documents']); $j++) {
                    //dd(count($old_archives[$i]['personal_documents']));
                    $path = implode('/', [
                        'archives',
                        $i,
                        'entrance_documents',
                        $j . '.pdf'
                    ]);

                    # Guarda el nuevo documento probatorio y lo actualiza en el modelo de datos.
                    Storage::put($path, base64_decode($old_archives[$i]['entrance_documents'][$j]['Contenido']));
                }
            }
            if (isset($old_archives[$i]['language_documents'])) {
                for ($j = 0; $j < count($old_archives[$i]['language_documents']); $j++) {
                    //dd(count($old_archives[$i]['personal_documents']));
                    $path = implode('/', [
                        'archives',
                        $i,
                        'language_documents',
                        $j . '.pdf'
                    ]);

                    # Guarda el nuevo documento probatorio y lo actualiza en el modelo de datos.
                    Storage::put($path, base64_decode($old_archives[$i]['language_documents'][$j]['Contenido']));
                }
            }
            if (isset($old_archives[$i]['curricular_documents'])) {
                for ($j = 0; $j < count($old_archives[$i]['curricular_documents']); $j++) {
                    //dd(count($old_archives[$i]['personal_documents']));
                    $path = implode('/', [
                        'archives',
                        $i,
                        'curricular_documents',
                        $j . '.pdf'
                    ]);

                    # Guarda el nuevo documento probatorio y lo actualiza en el modelo de datos.
                    Storage::put($path, base64_decode($old_archives[$i]['curricular_documents'][$j]['Contenido']));
                }
            }
           
           
        }
    }
    private function ReasingIntentionLetter(){

    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # sleep(10);

        # APIs.
        $this->mi_portal_service = new MiPortalService;
        $this->old_ce_service = new OldSchoolControlService;

        # Expedientes viejos.
        $old_archives_response = $this->old_ce_service->get('api/oldArchives');
        $old_archives = $old_archives_response->collect();

        #Descargar archivos viejos
        //$this->downloadAllOldArchives($old_archives);
        # Registra a los usuarios que ya estén en mi portal. Recupera el curp 
        # de dichos usuarios.
        $cropped_archives = $this->migrateOldUsers($old_archives);
        $this->migrateNewUsers($cropped_archives);

        $this->ReasigRecommentLetter();
        $this->ReasingIntentionLetter();

    }
}
