<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function players()
    {
        return $this->belongsToMany(Player::class)->withPivot(['deck_played', 'result_id'])->withTimestamps();
    }

    public function pairing()
    {
        return $this->belongsTo(Pairing::class);
    }
}
