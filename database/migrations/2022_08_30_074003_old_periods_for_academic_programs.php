<?php

use App\Models\Announcement;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OldPeriodsForAcademicPrograms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // IMAREC
        Announcement::create([
            'academic_program_id' => 4,
            'from' => '2020-11-12',
            'to' => '2021-11-12'
        ]);

        Announcement::create([
            'academic_program_id' => 4,
            'from' => '2019-11-12',
            'to' => '2020-11-12'
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
