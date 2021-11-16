<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_degrees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('archive_id')->constrained('archives')->onDelete('cascade');
            $table->string('cedula')->nullable();
            $table->string('degree')->nullable();
            $table->string('degree_type')->nullable();

            // Estado de titulación.
            $table->string('status')->nullable();
            $table->string('titration_date')->nullable();
            $table->string('titration_mode')->nullable();
            $table->string('country')->nullable();
            $table->string('university')->nullable();

            // Datos del cvu.
            $table->integer('cvu')->nullable();
            $table->string('knowledge_card')->nullable();
            $table->string('digital_signature')->nullable();

            // Datos del promedio.
            $table->float('average')->nullable();
            $table->float('min_avg')->nullable();
            $table->float('max_avg')->nullable();

            // Datos de control
            $table->string('state')->default('Incompleto');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('academic_degree_required_document', function (Blueprint $table) {
            $table->foreignId('academic_degree_id')
                ->constrained('academic_degrees')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreignId('required_document_id')
                ->constrained('required_documents')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('location')->nullable();
            $table->primary(['academic_degree_id', 'required_document_id'], 'pk_academicDegreeReqDocument');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_degree_required_document');
        Schema::dropIfExists('appliant_languages');
    }
}
