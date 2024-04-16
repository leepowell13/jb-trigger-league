<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Result extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'game_player')->withPivot(['deck_played', 'result_id'])->withTimestamps();
    }

    public function pairings(): BelongsToMany
    {
        return $this->belongsToMany(Pairing::class, 'pairing_team', 'pairing_result')->withPivot(['game_wins', 'game_losses', 'pairing_result']);
    }
}
