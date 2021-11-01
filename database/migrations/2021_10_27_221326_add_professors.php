<?php

use App\Jobs\AddProfessors as JobsAddProfessors;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfessors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        JobsAddProfessors::dispatch();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::where('type', 'workers')
           ->whereHas('roles', fn($q) => $q->where('name', 'profesor_nb'))
           ->forceDelete();
    }
}
