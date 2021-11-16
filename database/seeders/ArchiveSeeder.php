<?php

namespace Database\Seeders;

use App\Helpers\MiPortalService;
use App\Helpers\OldSchoolControlService;
use App\Models\AcademicProgram;
use App\Models\Archive;
use App\Models\RequiredDocument;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ArchiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # APIs.
        $mi_portal_service = new MiPortalService;
        $old_ce_service = new OldSchoolControlService;

        # Expedientes viejos, ubicados en un archivo json.
        $old_archives_response = $old_ce_service->get('api/oldArchives');
        Storage::put('expedientes_viejos.json', json_encode($old_archives_response->collect()->toArray(), JSON_PRETTY_PRINT));
        $old_archives = collect(json_decode(Storage::get('expedientes_viejos.json'), true));

        # Usuarios de sistema central
        $response = $mi_portal_service->miPortalGet('api/usuarios', [
            'fields[users]' => 'id,type,curp',
            'filter[curp]' => $old_archives->pluck('appliant_curp')->toArray(),
        ]);

        # Obtiene el curp de aquellos usuarios que estén registrados.
        $miPortal_appliants = $response->collect();
        
        # Crea un nuevo expediente (migra el expediente anterior) al sistema nuevo.
        foreach ($miPortal_appliants as $miPortal_appliant)
        {
            $appliant = User::firstOrCreate([
                'id' => $miPortal_appliant['id'],
                'type' => $miPortal_appliant['user_type']
            ]);

            if (!$appliant->hasRole('aspirante_local'))
                $appliant->assignRole('aspirante_local');

            $old_archive = $old_archives->firstWhere('appliant_curp', $miPortal_appliant['curp']);

            $new_archive = $appliant->archives()->firstOrCreate([
                'user_type' => $miPortal_appliant['user_type'], 
                'announcement_id' => isset($old_archive['academic_degrees'][0]['cvu']) ? 2 : 4,
                'status' => 1
            ]);

            $required_documents = [
                'personalDocuments' => collect($old_archive['personal_documents'] ?? []),
                'academicDocuments' => collect($old_archive['academic_documents'] ?? []),
                'entranceDocuments' => collect($old_archive['entrance_documents'] ?? []),
                'curricularDocuments' => collect($old_archive['curricular_documents'] ?? [])
            ];

            foreach ($required_documents as $type => $required_document_files)
            {
                /*
                foreach ($required_document_files as $file)
                {
                    $required_document_id = RequiredDocument::firstWhere('name', 'like', '%'.$file['name'].'%')->id ?? null;

                    if ($required_document_id === null)
                        continue;
    
                    $path = implode('/', [
                        'archives',
                        $new_archive->id,
                        $type,
                        $required_document_id.'.pdf'
                    ]);
    
                    Storage::put($path, base64_decode($file['Contenido']));
    


                    $new_archive->requiredDocuments()->updateExistingPivot($required_document_id, [
                        'location' => $path
                    ]);
                }
            }*/
        }


        $archives = [ 
            Archive::firstOrCreate([
                'user_id' => 262698,
                'user_type' => 'students',
                'announcement_id' => AcademicProgram::find(2)->latestAnnouncement->id,
                'status' => 1,
                'comments' => '',
            ]),
            Archive::firstOrCreate([
                'user_id' => 260651,
                'user_type' => 'students',
                'announcement_id' => AcademicProgram::find(2)->latestAnnouncement->id,
                'status' => 1,
                'comments' => '',
            ])
        ];

        $intention_letters = [
            $archives[0]->archiveRequiredDocuments()->whereIsIntentionLetter()->value('id'),
            $archives[1]->archiveRequiredDocuments()->whereIsIntentionLetter()->value('id')
        ];

        $archives[0]->intentionLetter()->firstOrCreate([
            'archive_required_document_id' => $intention_letters[0],
            'user_id' => 12457,
            'user_type' => 'workers'
        ]);

        $archives[1]->intentionLetter()->firstOrCreate([
            'archive_required_document_id' => $intention_letters[1],
            'user_id' => 12457,
            'user_type' => 'workers'
        ]);
    }
}
