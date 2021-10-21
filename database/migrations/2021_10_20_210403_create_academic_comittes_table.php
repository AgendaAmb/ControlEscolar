<?php

use App\Models\AcademicComitte;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicComittesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_comittes', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->timestamps();
            $table->softDeletes();
        });

        AcademicComitte::create(['name'=>'IMaREC']);
        AcademicComitte::create(['name'=>'PMPCA']);

        Schema::create('academic_comitte_user', function (Blueprint $table){
            $table->foreignId('academic_comitte_id')
                ->constrained('academic_comittes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('user_id');
            $table->string('user_type');
        
            $table->foreign(['user_id','user_type'])
                ->references(['id','type'])
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_comitte_user');
        Schema::dropIfExists('academic_comittes');
    }
}
