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
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('institution')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('projectTitle')->nullable();
            $table->longText('description')->nullable();
            $table->string('searchTerm')->nullable();
            $table->longText('notes')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('downloads');
    }
};

