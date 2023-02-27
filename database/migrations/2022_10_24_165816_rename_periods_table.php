<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('periods')) {
            Schema::table('periods', function (Blueprint $table) {
                $table->dropForeign(['announcement_id']); 
                $table->dropColumn('announcement_id');
            });
            Schema::rename('periods', 'interview_periods');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('interview_periods')) {
            Schema::rename('interview_periods', 'periods');
        }
    }
}
