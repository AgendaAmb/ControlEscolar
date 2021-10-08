<?php

use App\Models\Archive;
use Carbon\Carbon;
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
            'academic_program_id' => 1,
            'status' => 0,
            'comments' => '',
        ]);

        Archive::create([
            'academic_program_id' => 2,
            'status' => 0,
            'comments' => '',
        ]);

        Archive::create([
            'academic_program_id' => 3,
            'status' => 0,
            'comments' => '',
        ]);

        Archive::create([
            'academic_program_id' => 4,
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
