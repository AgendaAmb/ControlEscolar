<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDictamenCeToEvaluationRubricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluation_rubrics', function (Blueprint $table) {
            $table->string('dictamen_ce')->nullable();
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
            $table->dropColumn('dictamen_ce');
        });
    }
}
