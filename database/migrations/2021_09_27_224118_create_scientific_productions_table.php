<?php

use App\Models\Archive;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScientificProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scientific_productions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Archive::class)
                ->constrained('archives')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->timestamp('publish_date')->nullable();

            # Estados de control.
            $table->string('state')->default('Incompleto');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->foreignId('scientific_production_id')
                ->primary()
                ->constrained('scientific_productions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('magazine_name');
        });

        Schema::create('published_chapters', function (Blueprint $table) {
            $table->foreignId('scientific_production_id')
                ->primary()
                ->constrained('scientific_productions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('article_name');
        });

        Schema::create('technical_reports', function (Blueprint $table) {
            $table->foreignId('scientific_production_id')
                ->primary()
                ->constrained('scientific_productions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('institution');
        });

        Schema::create('working_memories', function (Blueprint $table) {
            $table->foreignId('scientific_production_id')
                ->primary()
                ->constrained('scientific_productions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('post_title');
        });

        Schema::create('working_documents', function (Blueprint $table) {
            $table->foreignId('scientific_production_id')
                ->primary()
                ->constrained('scientific_productions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('post_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('working_documents');
        Schema::dropIfExists('working_memories');
        Schema::dropIfExists('technical_reports');
        Schema::dropIfExists('published_chapters');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('scientific_productions');
    }
}
