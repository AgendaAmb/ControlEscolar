<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewPeriodHasAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_period_has_announcements', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('interview_period_id');
            $table->unsignedBigInteger('announcement_id');

            $table->foreign('interview_period_id')
                ->references('id')
                ->on('interview_periods')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('announcement_id')
                ->references('id')
                ->on('announcements')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            # Control de modelos.
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interview_period_has_announcements');
    }
}
