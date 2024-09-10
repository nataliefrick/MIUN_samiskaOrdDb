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
            $table->string('word_sydsamiska');
            $table->longText('definition_sydsamiska');
            $table->string('word_svenska');
            $table->longText('definition_svenska');
            $table->integer('synonyms')->nullable(); //word_id of synonyms
            $table->integer('antonyms')->nullable(); //word_id of synonyms
            $table->longText('example_of_use');
            $table->longText('link_to_update');
            $table->longText('sources');
            $table->integer('arousal_level');
            $table->integer('frequency_id');
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




