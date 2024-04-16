<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Season extends Model
{
    use HasFactory;

    public function pairings(): HasMany
    {
        return $this->hasMany(Pairing::class);
    }

    public function pairingStatistics(): HasMany
    {
        return $this->hasMany(PairingStatistic::class);
    }

    public function gameStatistics(): HasMany
    {
        return $this->hasMany(GameStatistic::class);
    }

    public static function currentSeason(): Season
    {
        return Season::where('end_date', null)->orderBy('start_date', 'desc')->first();
    }
}
