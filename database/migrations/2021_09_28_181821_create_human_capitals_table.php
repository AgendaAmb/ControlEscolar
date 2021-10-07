<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumanCapitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('human_capitals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('archive_id')
                ->constrained('archives')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('course_name')->nullable();
            $table->date('assisted_at')->nullable();
            $table->string('scolarship_level')->nullable();


            # Estados de control.
            $table->string('state')->default('Incompleto');
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
        Schema::dropIfExists('human_capitals');
    }
}
