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
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->string('country')->nullable();
            $table->string('university')->nullable();
            $table->integer('cvu')->nullable();
            $table->string('knowledge_card')->nullable();
            $table->float('average');
            $table->float('min_avg');
            $table->float('max_avg');
            $table->softDeletes();
        });

        Schema::create('academic_degree_required_document', function (Blueprint $table) {
            $table->foreignId('academic_degree_id')
                ->constrained('academic_degrees')
                ->onDelete('cascade');
            
            $table->foreignId('required_document_id')
                ->constrained('required_documents')
                ->onDelete('cascade');

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
