<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAcademicProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_programs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 70);
            $table->string('alias', 30);
            $table->string('type');

            $table->index('name');
            $table->index('alias');

            $table->softDeletes();
        });

        
        

        Schema::create('academic_program_required_document', function (Blueprint $table) {
            $table->foreignId('academic_program_id')->constrained()->onDelete('cascade');
            $table->foreignId('required_document_id')->constrained()->onDelete('cascade');
        });

        DB::table('academic_programs')->insert([
            ['name' => 'Maestría en ciencias ambientales', 'alias' => 'maestria', 'type' => 'maestría'],
            ['name' => 'Doctorado en ciencias ambientales', 'alias' => 'doctorado', 'type' => 'doctorado'],
            ['name' => 'Maestría en ciencias ambientales, doble titulación', 'alias' => 'enrem', 'type' => 'maestría'],
            ['name' => 'Maestría Interdisciplinaria en ciudades sostenibles', 'alias' => 'imarec', 'type' => 'maestría'],
        ]);

        /*
        DB::table('academic_program_required_document')->insert([

            # Maestría en ciencias ambientales
            [ 'required_document_id' => 1, 'academic_program_id' => 1 ],
            [ 'required_document_id' => 2, 'academic_program_id' => 1 ],
            [ 'required_document_id' => 3, 'academic_program_id' => 1 ],
            [ 'required_document_id' => 4, 'academic_program_id' => 1 ],
            [ 'required_document_id' => 5, 'academic_program_id' => 1 ],
            [ 'required_document_id' => 8, 'academic_program_id' => 1 ],
            [ 'required_document_id' => 10, 'academic_program_id' => 1 ],
            [ 'required_document_id' => 12, 'academic_program_id' => 1 ],
            [ 'required_document_id' => 14, 'academic_program_id' => 1 ],
            [ 'required_document_id' => 15, 'academic_program_id' => 1 ],
            [ 'required_document_id' => 16, 'academic_program_id' => 1 ],
            [ 'required_document_id' => 17, 'academic_program_id' => 1 ],
            [ 'required_document_id' => 19, 'academic_program_id' => 1 ],
            [ 'required_document_id' => 20, 'academic_program_id' => 1 ],
            [ 'required_document_id' => 21, 'academic_program_id' => 1 ],

            # Doctorado en ciencias ambientales.
            [ 'required_document_id' => 1, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 2, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 3, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 4, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 5, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 7, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 8, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 9, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 10, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 11, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 12, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 13, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 14, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 15, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 16, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 17, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 18, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 19, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 20, 'academic_program_id' => 2 ],
            [ 'required_document_id' => 21, 'academic_program_id' => 2 ],

            # ENREM.
            [ 'required_document_id' => 22, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 23, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 24, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 25, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 26, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 27, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 28, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 29, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 30, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 31, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 32, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 33, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 34, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 35, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 36, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 37, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 38, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 39, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 40, 'academic_program_id' => 3 ],
            [ 'required_document_id' => 41, 'academic_program_id' => 3 ],

            # Maestría en ciencias ambientales
            [ 'required_document_id' => 1, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 2, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 3, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 4, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 5, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 8, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 10, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 12, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 14, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 15, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 16, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 17, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 18, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 19, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 20, 'academic_program_id' => 4 ],
            [ 'required_document_id' => 21, 'academic_program_id' => 4 ],
        ]);*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('academic_program_required_document');
        Schema::dropIfExists('academic_programs');
    }
}
