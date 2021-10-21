<?php

use App\Models\AcademicProgram;
use App\Models\Archive;
use App\Models\EvaluationRubric;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertTestArchive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Archive::create([
            'user_id' => 262698,
            'user_type' => 'students',
            'announcement_id' => AcademicProgram::find(1)->latestAnnouncement->id,
            'status' => 1,
            'comments' => '',
        ]);

        Archive::create([
            'user_id' => 260651,
            'user_type' => 'students',
            'announcement_id' => AcademicProgram::find(2)->latestAnnouncement->id,
            'status' => 1,
            'comments' => '',
        ]);

        DB::table('archive_intention_letter')->insert([
            ['required_document_id' => 17, 'archive_id' => 1, 'user_id' => 12457, 'user_type' => 'workers'],
            ['required_document_id' => 17, 'archive_id' => 2, 'user_id' => 12457, 'user_type' => 'workers']]);

        EvaluationRubric::create(['archive_id' => 1]);
        EvaluationRubric::create(['archive_id' => 2]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Archive::truncate();
    }
}
