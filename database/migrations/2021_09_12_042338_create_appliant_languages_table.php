<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliantLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appliant_languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('archive_id')->constrained('archives')->onDelete('cascade');
            $table->string('language')->nullable();
            $table->string('institution')->nullable();
            $table->integer('score')->nullable();
            $table->date('presented_at')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();
            $table->string('language_domain')->nullable();
            $table->string('conversational_level')->nullable();
            $table->string('reading_level')->nullable();
            $table->string('writing_level')->nullable();

            # Estados de control.
            $table->string('state')->default('Incompleto');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('appliant_language_required_document', function (Blueprint $table) {
            $table->foreignId('appliant_language_id')
                ->constrained('appliant_languages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreignId('required_document_id')
                ->constrained('required_documents')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('location')->nullable();
            $table->primary(['appliant_language_id', 'required_document_id'], 'pk_appliantLanguageReqDocument');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appliant_language_required_document');
        Schema::dropIfExists('appliant_languages');
    }
}
