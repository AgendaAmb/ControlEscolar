<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInterviewIdToEvaluationRubricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluation_rubrics', function (Blueprint $table) {
            $table->unsignedBigInteger('interview_id')->after('id');
            $table->foreign('interview_id')
            ->references('id')
            ->on('interviews')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evaluation_rubrics', function (Blueprint $table) {
            $table->dropConstrainedForeignId('interview_id');
        });
    }
}
