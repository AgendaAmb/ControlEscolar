<?php

use App\Models\AcademicProgram;
use App\Models\Archive;
use Illuminate\Database\Migrations\Migration;

class InsertTestArchive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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

        $archives[0]->intentionLetter()->create([
            'archive_required_document_id' => $intention_letters[0],
            'user_id' => 12457,
            'user_type' => 'workers'
        ]);

        $archives[1]->intentionLetter()->create([
            'archive_required_document_id' => $intention_letters[1],
            'user_id' => 12457,
            'user_type' => 'workers'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Archive::withTrashed()->whereIn('id', Archive::withTrashed()->pluck('id'))->forceDelete();
    }
}
