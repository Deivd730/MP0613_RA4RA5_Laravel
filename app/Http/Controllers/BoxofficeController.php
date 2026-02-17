<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boxoffices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id');
            $table->decimal('earnings', 15, 2);
            $table->string('currency', 3)->default('USD');
            $table->date('date_recorded')->nullable();
            $table->timestamps();
            
            // Foreign key relationship with films table
            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
            
            // Unique constraint to prevent duplicate records for the same film on the same date
            $table->unique(['film_id', 'date_recorded']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boxoffices');
    }
};