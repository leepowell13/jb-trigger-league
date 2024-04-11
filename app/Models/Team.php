<?php

namespace App\Models;

use App\Traits\GameStatisticsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    use GameStatisticsTrait;

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function captain()
    {
        return $this->belongsTo(Player::class, 'captain_id');
    }

    public function pairings()
    {
        return $this->belongsToMany(Pairing::class)->withPivot(['game_wins', 'game_losses', 'pairing_result']);
    }

    public function pairingStatistics()
    {
        return $this->hasMany(PairingStatistic::class);
    }

    public function latestPairingStats()
    {
        return $this->hasOne(PairingStatistic::class)->latestOfMany();
    }
}
