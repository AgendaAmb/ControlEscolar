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

            # Datos de la empresa.
            $table->string('institution')->nullable();
            $table->string('working_position')->nullable();

            # Fecha de inicio y fin
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('knowledge_area')->nullable();
            $table->string('field')->nullable();

            # Descripción del puesto y logros.
            $table->text('working_position_description')->nullable();
            $table->text('achievements')->nullable();

            # Estados de control.
            $table->string('state')->default('Incompleto');
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
