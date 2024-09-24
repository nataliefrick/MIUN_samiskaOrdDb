<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->string('word_sydsamiska')->nullable();
            $table->longText('definition_sydsamiska')->nullable();
            $table->string('word_svenska')->nullable();
            $table->longText('definition_svenska')->nullable();
            $table->string('word_norska')->nullable();
            $table->longText('definition_norska')->nullable();
            $table->text('synonyms')->nullable(); //list of synonyms
            $table->text('antonyms')->nullable(); //list of synonyms
            $table->longText('example_of_use')->nullable();
            $table->longText('sources')->nullable();
            $table->integer('arousal_level')->nullable();
            $table->integer('frequency_id')->nullable();
            // $table->foreignId('frequency');
            $table->timestamps();
            
            // $table->boolean('test_generated')->default(false);
            // $table->integer('result')->default(0);
            // $table->longText('certificate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};




