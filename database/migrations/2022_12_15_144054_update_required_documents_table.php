<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateRequiredDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        DB::table('required_documents')->insert([
            
            # Documento de enrem / Expediente final
            [
                'name' =>"File Signed",
                'type' => 'enrem',
                'label' => "File_Signed_Initials(Surnames,Names)",                
                'notes' => null,
                'example' => 'File_Signed_CJG',
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
