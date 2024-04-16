<?php

namespace App\Models;

use App\Traits\GameStatisticsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Team extends Model
{
    use HasFactory;
    use GameStatisticsTrait;

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    public function captain(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'captain_id');
    }

    public function pairings(): BelongsToMany
    {
        return $this->belongsToMany(Pairing::class)->withPivot(['game_wins', 'game_losses', 'pairing_result']);
    }

    public function pairingStatistics(): HasMany
    {
        return $this->hasMany(PairingStatistic::class);
    }

    public function latestPairingStats(): HasOne
    {
        return $this->hasOne(PairingStatistic::class)->latestOfMany();
    }
}
