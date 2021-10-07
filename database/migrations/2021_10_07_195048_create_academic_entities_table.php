<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAcademicEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_entities', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            # Estados de control
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('academic_entities')->insert([
            ['name' => 'UASLP_FACULTAD DE CIENCIAS QUÍMICAS'],
            ['name' => 'UASLP_FACULTAD DE INGENIERÍA'],
            ['name' => 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS'],
            ['name' => 'UASLP_FACULTAD DE AGRONOMÍA'],
            ['name' => 'UASLP_COORDINACIÓN ACADÉMICA REGIÓN ALTIPLANO'],
            ['name' => 'UASLP_CIACYT'],
            ['name' => 'UASLP_FACULTAD DE MEDICINA'],
            ['name' => 'UASLP_FACULTAD DE CIENCIAS SOCIALES Y HUMANIDADES'],
            ['name' => 'FACULTAD DE PSICOLOGÍA'],
            ['name' => 'UASLP_UNIDAD ACADÉMICA MULTIDISCIPLINARIA ZONA HUASTECA'],
            ['name' => 'UASLP_FACULTAD DE DERECHO'],
            ['name' => 'UASLP_FACULTAD DEL HÁBITAT']            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_entities');
    }
}
