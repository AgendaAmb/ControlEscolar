<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsScientificProduction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews_cp', function (Blueprint $table) {
            $table->foreignId('scientific_production_id')
                ->primary()
                ->constrained('scientific_productions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('post_title_review')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews_cp');
    }
}
