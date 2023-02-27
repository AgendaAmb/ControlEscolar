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

        Schema::create('academic_area_user', function (Blueprint $table) {
            $table->foreignId('academic_area_id')
                ->constrained('academic_areas')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->string('user_type');

            $table->foreign(['user_id','user_type'])
                ->references(['id','type'])
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->primary(['academic_area_id','user_id','user_type']);
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
