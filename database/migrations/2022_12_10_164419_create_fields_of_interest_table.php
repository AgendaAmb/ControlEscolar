<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsOfInterestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields_of_interest', function (Blueprint $table) {
            $table->id();
            $table->foreignId('archive_id')->constrained('archives')->onDelete('cascade');
            $table->string('research_area_mexico')->nullable();
            $table->string('research_area_german')->nullable();
            $table->string('professor_research_mexico')->nullable();
            $table->string('professor_research_german')->nullable();

            $table->longText('elective_modules_PMPCA')->nullable();
            $table->longText('elective_modules_ITT')->nullable();

            $table->timestamps();            
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields_of_interest');
    }
}
