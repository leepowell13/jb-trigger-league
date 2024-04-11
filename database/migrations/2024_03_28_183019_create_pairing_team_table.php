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
        Schema::create('pairing_team', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->foreignId('pairing_id')->constrained();
            $table->integer('game_wins');
            $table->integer('game_losses');
            $table->string('pairing_result')->virtualAs("IF(game_wins>game_losses,'W',IF(game_wins<game_losses,'L','T'))");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pairing_team');
    }
};
