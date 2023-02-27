<?php

use App\Models\Announcement;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_program_id')
                ->constrained('academic_programs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            $table->date('from');
            $table->date('to');

            $table->timestamps();
            $table->softDeletes();
        });

        Announcement::create([
            'academic_program_id' => 1,
            'from' => '2020-11-12',
            'to' => '2021-11-12'
        ]);

        Announcement::create([
            'academic_program_id' => 2,
            'from' => '2021-06-14',
            'to' => '2021-11-20'
        ]);

        Announcement::create([
            'academic_program_id' => 3,
            'from' => '2020-11-12',
            'to' => '2021-11-12'
        ]);

        Announcement::create([
            'academic_program_id' => 4,
            'from' => '2020-11-12',
            'to' => '2021-11-12'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
