<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationConceptDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_concept_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluation_concept_id')
                ->constrained('evaluation_concepts')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('description', 512);
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
        Schema::dropIfExists('evaluation_concept_details');
    }
}
