<?php

namespace App\Models;

use App\Traits\GameStatisticsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    use GameStatisticsTrait;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class)->withPivot(['deck_played', 'result_id'])->withTimestamps();
    }
}
