<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_program_id')->constrained('academic_programs')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('archive_required_document', function (Blueprint $table){
            $table->foreignId('archive_id')->constrained('archives')->onDelete('cascade');
            $table->foreignId('required_document_id')->constrained('required_documents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archives_required_document');
        Schema::dropIfExists('archives');
    }
}
