<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAcademicAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            # Estados de control
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('academic_area_archive', function (Blueprint $table) {
            $table->foreignId('academic_area_id')
                ->constrained('academic_areas')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('archive_id')
                ->constrained('archives')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        DB::table('academic_areas')->insert([
            ['name' => 'Prevención y control'],
            ['name' => 'Evaluación ambiental'],
            ['name' => 'Recursos naturales renovables'],
            ['name' => 'Salud ambiental integrada'],
            ['name' => 'Gestión ambiental'],
            ['name' => 'Ciencias de la ingeniería'],
            ['name' => 'Ciencias sociales, humanidades y jurídicas'],
            ['name' => 'Ciencias del hábitat'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_area_archive');
        Schema::dropIfExists('academic_areas');
    }
}
