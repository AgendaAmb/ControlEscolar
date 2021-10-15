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
        Archive::create([
            'user_id' => 262698,
            'user_type' => 'students',
            'announcement_id' => AcademicProgram::find(1)->latestAnnouncement->id,
            'status' => 0,
            'comments' => '',
        ]);

        Archive::create([
            'user_id' => 260651,
            'user_type' => 'students',
            'announcement_id' => AcademicProgram::find(2)->latestAnnouncement->id,
            'status' => 0,
            'comments' => '',
        ]);

        Archive::create([
            'user_id' => 11007,
            'user_type' => 'workers',
            'announcement_id' => AcademicProgram::find(3)->latestAnnouncement->id,
            'status' => 0,
            'comments' => '',
        ]);

        Archive::create([
            'user_id' => 12457,
            'user_type' => 'workers',
            'announcement_id' => AcademicProgram::find(4)->latestAnnouncement->id,
            'status' => 0,
            'comments' => '',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
