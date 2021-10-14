<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_user', function (Blueprint $table) {
            $table->foreignId('interview_id')
                ->constrained('interviews')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('user_id');
            $table->string('user_type');

            $table->foreign(['user_id', 'user_type'])
                ->references(['id','type'])
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['interview_id', 'user_id', 'user_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interview_user');
    }
}
