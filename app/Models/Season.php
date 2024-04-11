<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    public function pairings()
    {
        return $this->hasMany(Pairing::class);
    }

    public function pairingStatistics()
    {
        return $this->hasMany(PairingStatistic::class);
    }

    public function gameStatistics()
    {
        return $this->hasMany(GameStatistic::class);
    }

    public static function currentSeason()
    {
        return Season::where('end_date', null)->orderBy('start_date', 'desc')->first() ?? 'No Active Season';
    }
}
