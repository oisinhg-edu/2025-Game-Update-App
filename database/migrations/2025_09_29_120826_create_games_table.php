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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('release_date');

            // string value for platform but only allows the listed options. defaults to PC.
            $table->enum('platform', ['PC', 'PS', 'Xbox', 'Nintendo'])->default('PC');

            // name and location of the image as a string, actual image in public folder on server.
            $table->string('cover_img');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
