<?php

namespace App\Models;

use App\Traits\SeasonTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pairing extends Model
{
    use HasFactory;
    use SeasonTrait;

    public function teams()
    {
        return $this->belongsToMany(Team::class)->withPivot(['game_wins', 'game_losses', 'pairing_result']);
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
