<?php

namespace App\Models;

use App\Traits\GameStatisticsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    use HasFactory;
    use GameStatisticsTrait;

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class)->withPivot(['deck_played', 'result_id'])->withTimestamps();
    }
}
