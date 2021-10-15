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
            $table->unsignedBigInteger('user_id');
            $table->string('user_type');
            
            $table->foreign(['user_id', 'user_type'])
                ->references(['id', 'type'])
                ->on('users')
                ->onDelete('cascade');

            $table->foreignId('announcement_id')
                ->constrained('announcements')
                ->onDelete('cascade');

            $table->integer('status');
            $table->string('comments')->nullable();
            $table->string('motivation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('archive_required_document', function (Blueprint $table){
            $table->foreignId('archive_id')->constrained('archives')->onDelete('cascade');
            $table->foreignId('required_document_id')->constrained('required_documents')->onDelete('cascade');
            $table->string('location')->nullable();

            $table->primary(['archive_id', 'required_document_id'], 'pk_archive_required_document');
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
