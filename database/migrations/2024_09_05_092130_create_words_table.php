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
            $table->integer('frequency')->nullable();
            $table->foreignId('node_id')->nullable()->constrained('nodes')->nullOnDelete();  // Bind to the nodes table ->default(false)
            $table->longText('expression')->nullable();
            $table->timestamps();
            
            // Foreign key constraint
            // $table->foreign('node_id')->references('id')->on('nodes')->onDelete('cascade');
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




