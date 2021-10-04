<?php

use App\Models\Archive;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Archive::class)
                ->constrained('archives')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('institution')->nullable();
            $table->string('working_position')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('knowledge_area')->nullable();
            $table->string('field')->nullable();
            $table->string('working_position_name')->nullable();
            $table->string('achievements')->nullable();

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
        Schema::dropIfExists('working_experiences');
    }
}
