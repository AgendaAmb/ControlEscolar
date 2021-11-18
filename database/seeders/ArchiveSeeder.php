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

        # Asigna un profesor temporal, que otorgó la carta de intención.
        $new_archive->intentionLetter()->firstOrCreate([
            'archive_required_document_id' => $new_archive
                ->archiveRequiredDocuments()
                ->whereIsIntentionLetter()
                ->value('id'),
            'user_id' => 12457,
            'user_type' => 'workers'
        ]);

        return $new_archive;
    }

    /**
     * Creates a new archive.
     *
     * @return void
     */
    private function storeOldDocuments($appliant, $old_archive, $new_archive)
    {
        # Recolecta los documentos requeridos.
        $required_documents = [
            'personalDocuments' => collect($old_archive['personal_documents'] ?? []),
            'academicDocuments' => collect($old_archive['academic_documents'] ?? []),
            'entranceDocuments' => collect($old_archive['entrance_documents'] ?? []),
            'languageDocuments' => collect($old_archive['languageDocuments'] ?? []),
            'curricularDocuments' => collect($old_archive['curricular_documents'] ?? [])
        ];

        # Guarda los documentos probatorios del sistema viejo, en el sistema
        # de archivos del nuevo sistema..
        foreach ($required_documents as $type => $required_document_files)
        {
            foreach ($required_document_files as $file)
            {
                # Busca el id del documento requerido, que tenga coincidencia con el nombre.
                $required_document_id = RequiredDocument::firstWhere('name', 'like', '%'.$file['name'].'%')->id ?? null;

                # En caso de no encontrarse, se va al siguiente documento.
                if ($required_document_id === null)
                    continue;

                # Genera la ruta del documento probatorio.
                $path = implode('/', [
                    'archives',
                    $new_archive->id,
                    $type,
                    $required_document_id.'.pdf'
                ]);
    
                # Guarda el nuevo documento probatorio y lo actualiza en el modelo de datos.
                Storage::put($path, base64_decode($file['Contenido']));

                $new_archive->requiredDocuments()->updateExistingPivot($required_document_id, [
                    'location' => $path
                ]);
            }
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function migrateOldUsers(&$old_archives)
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
        
        # Crea un nuevo expediente (migra el expediente anterior) al sistema nuevo.
        foreach ($appliants as $appliant)
        {
            # Nuevo postulante o recupera una instancia previa.
            $new_appliant = User::firstOrCreate([
                'id' => $appliant['id'],
                'type' => $appliant['user_type']
            ]);

            # El usuario creado es un nuevo postulante.
            if (!$new_appliant->hasRole('aspirante_local'))
            {
                $new_appliant->assignRole('aspirante_local');
                $new_appliants[] = $new_appliant;
            }

            # Busca el expediente viejo.
            $old_archive = $old_archives->firstWhere('appliant_curp', $appliant['curp']);

            # Crea un expediente nuevo.
            $new_archive = $this->newArchive($new_appliant, $appliant, $old_archive);

            # Guarda los documentos probatorios.
            $this->storeOldDocuments($appliant, $old_archive, $new_archive);
        }

        # Filtra aquellos expedientes, que no estén en el arreglo de nuevos 
        # postulantes.
        $old_archives = $old_archives
            ->whereNotIn('appliant_curp', collect($appliants)->pluck('curp')->toArray())
            ->whereNotNull('name')
            ->whereNotNull('middlename');

        return $new_appliants;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function migrateNewUsers(&$old_archives)
    {   
        # Arreglo con los nuevos postulantes.
        $new_appliants = [];

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

        if ($response->failed())
        {
            dump($response->status());
            return;
        }

        # Obtiene el curp de aquellos usuarios que estén registrados.
        $this->migrateOldUsers($old_archives);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # APIs.
        $this->mi_portal_service = new MiPortalService;
        $this->old_ce_service = new OldSchoolControlService;

        # Expedientes viejos.
        $old_archives_response = $this->old_ce_service->get('api/oldArchives');
        $old_archives = $old_archives_response->collect();

        # Registra a los usuarios que ya estén en mi portal. Recupera el curp 
        # de dichos usuarios.
        $this->migrateOldUsers($old_archives);
        $this->migrateNewUsers($old_archives);
    }
}
