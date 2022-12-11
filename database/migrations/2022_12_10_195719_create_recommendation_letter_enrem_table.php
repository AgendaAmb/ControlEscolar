<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommendationLetterEnremTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommendation_letter_enrem', function (Blueprint $table) {
            $table->id();
            $table->foreignId('archive_id')->constrained('archives')->onDelete('cascade');
            $table->string('type')->nullable();
            $table->date('date')->nullable();
            $table->string('title')->nullable();
            $table->string('position')->nullable();
            $table->string('organization')->nullable();
            $table->bigInteger('telephone')->nullable();

            $table->longText('full_name')->nullable();
            $table->longText('email')->nullable();
            
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
        Schema::dropIfExists('recommendation_letter_enrem');
    }
}
