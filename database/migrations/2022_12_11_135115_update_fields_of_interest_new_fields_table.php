<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsOfInterestNewFieldsTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fields_of_interest', function (Blueprint $table) {
            $table->longText('elective_modules_PMPCA_german')->nullable();
            $table->longText('elective_modules_PMPCA_mexico')->nullable();
            $table->longText('elective_modules_ITT_german')->nullable();
            $table->longText('elective_modules_ITT_mexico')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('fields_of_interest', function (Blueprint $table) {
            $table->dropColumn('elective_modules_PMPCA');
            $table->dropColumn('elective_modules_ITT');
        });
    }
}
