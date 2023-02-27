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

        Schema::create('academic_entity_user', function (Blueprint $table) {
            $table->foreignId('academic_entity_id')
                ->constrained('academic_entities')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->string('user_type');

            $table->foreign(['user_id','user_type'])
                ->references(['id','type'])
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->primary(['academic_entity_id','user_id','user_type'],'pk_acad_ent_user');
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
        Schema::dropIfExists('academic_entity_user');
        Schema::dropIfExists('academic_entities');
    }
}
