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
        Schema::create('pairing_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->foreignId('season_id')->constrained();
            $table->integer('pairings_played')->virtualAs('pairing_wins + pairing_losses + pairing_ties');
            $table->integer('pairing_wins')->default(0);
            $table->integer('pairing_losses')->default(0);
            $table->integer('pairing_ties')->default(0);
            $table->integer('points')->virtualAs('(pairing_wins * 3) + pairing_ties');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pairing_statistics');
    }
};
