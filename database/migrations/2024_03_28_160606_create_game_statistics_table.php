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
        Schema::create('game_statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gameable_id');
            $table->string('gameable_type');
            $table->index(['gameable_id', 'gameable_type']);
            $table->foreignId('season_id')->constrained();
            $table->integer('played')->virtualAs('wins + losses');
            $table->integer('wins')->default(0);
            $table->integer('losses')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_statistics');
    }
};
