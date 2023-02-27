<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePeriodsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('periods'))
            return;

        if (Schema::hasColumn('periods', 'finished'))
            return;

        Schema::table('periods', function (Blueprint $table) {
            $table->boolean('finished')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable('periods'))
            return;

        if (!Schema::hasColumn('periods', 'finished'))
            return;

        Schema::table('periods', function (Blueprint $table) {
            $table->dropColumn('finished');
        });
    }
}
