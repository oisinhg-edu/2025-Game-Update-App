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
        Schema::create('patches', function (Blueprint $table) {
            $table->id();

            // if game deleted, patch deleted too
            $table->foreignId('game_id')->constrained()->cascadeOnDelete();
            // if user who wrote patch deleted, patch stays but user value is made null
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->string('version');
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patches');
    }
};
