<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('archive_id')->constrained('archives')->onDelete('cascade');
            $table->longText('care_of')->nullable();
            $table->longText('street')->nullable();
            $table->integer('number_address')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('state_country')->nullable();
            $table->bigInteger('telephone')->nullable();
            $table->bigInteger('mobile_phone')->nullable();

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
        Schema::dropIfExists('address');
    }
}
