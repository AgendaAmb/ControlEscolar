<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('type', 25);

            $table->primary(['id','type']);
            $table->string('birth_state')->nullable();
            $table->string('marital_state')->nullable();

            # Banderas y estados de control.
            $table->timestamps();
            $table->softDeletes();
        });

        User::create([
            'id' => 262698,
            'type' => 'students'
        ]);

        User::create([
            'id' => 260651,
            'type' => 'students'
        ]);

        
        User::create([
            'id' => 11007,
            'type' => 'workers'
        ]);

        User::create([
            'id' => 12457,
            'type' => 'workers'
        ]);

        User::create([
            'id' => 7515,
            'type' => 'workers'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
