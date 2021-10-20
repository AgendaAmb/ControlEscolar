<?php

use App\Models\EvaluationConcept;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationConceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_concepts', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('description', 1024);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('evaluation_concept_evaluation_rubric', function (Blueprint $table) {
            $table->unsignedBigInteger('evaluation_concept_id');
            $table->unsignedBigInteger('evaluation_rubric_id');
            $table->string('notes')->nullable();
            $table->integer('score')->nullable();

            $table->foreign('evaluation_concept_id', 'fk_eval_concept')
                ->references('id')
                ->on('evaluation_concepts')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('evaluation_rubric_id', 'fk_eval_rubric')
                ->references('id')
                ->on('evaluation_rubrics')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary([
                'evaluation_concept_id', 
                'evaluation_rubric_id'
            ], 'pk_eval_concept_eval_rubric');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation_concept_evaluation_rubric');
        Schema::dropIfExists('evaluation_concepts');
    }
}
