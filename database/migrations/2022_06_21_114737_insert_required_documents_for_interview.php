<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertRequiredDocumentsForInterview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('required_documents')->insert([
            [
                'name' => '20.- Ensayo de entrevista (Maestria)', 
                'label' => '20_EnsayoEntrevista_añodesolicitud_iniciales', 
                'example' => '20_EnsayoEntrevista_2021_CJG', 
                'type' => 'interview',
                'notes' => null,
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],[
                'name' => '21.- Presentacion de entrevista (Doctorado)', 
                'label' => '21_PresentacionEntrevista_añodesolicitud_iniciales', 
                'example' => '21_PresentacionEntrevista_2021_CJG', 
                'type' => 'interview',
                'notes' => null,
                'intention_letter' => false,
                'recommendation_letter' => false,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
