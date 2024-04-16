<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    use HasFactory;

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class)->orderBy('team_id')->withPivot(['deck_played', 'result_id'])->withTimestamps();
    }

    public function pairing(): BelongsTo
    {
        return $this->belongsTo(Pairing::class);
    }
}
