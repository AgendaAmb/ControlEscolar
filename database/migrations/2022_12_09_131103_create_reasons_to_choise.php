<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReasonsToChoise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reasons_to_choise', function (Blueprint $table) {
            $table->id();
            $table->foreignId('archive_id')->constrained('archives')->onDelete('cascade');
            $table->string('first_choise')->nullable();
            $table->longText('reasons_choise')->nullable();
            $table->string('others_choises')->nullable();
            $table->json('selected_choises')->nullable();
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
        Schema::dropIfExists('reasons_to_choise');
    }
}
