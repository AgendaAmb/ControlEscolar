<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationRubricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_rubrics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('archive_id')
                ->constrained('archives')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('user_id');
            $table->string('user_type');
    
            $table->foreign(['user_id', 'user_type'])
                ->references(['id','type'])
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            $table->string('considerations')->nullable();
            $table->string('additional_information')->nullable();
            $table->boolean('isComplete')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation_rubrics');
    }
}
