<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAcademicDegreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('academic_degrees', function (Blueprint $table) {
            $table->date('date_of_award_of_degree')->nullable();
            $table->string('final_grade_average')->nullable();
            $table->string('graduation_mode')->nullable();
            $table->longText('fill_according_graduation')->nullable();
        });
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
