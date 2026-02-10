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
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('year');
            $table->string('genre');
            $table->string('img_url');
            $table->string('country');
            $table->integer('time');
            $table->timestamps();
        });
    }

    /** * Reverse the migrations. */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropIfExists('movies');
        });
    }
};
