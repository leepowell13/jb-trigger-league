<?php

namespace App\Traits;

use App\Models\GameStatistic;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait GameStatisticsTrait
{
    public function gameStatistics(): MorphMany
    {
        return $this->morphMany(GameStatistic::class, 'gameable');
    }

    public function latestGameStats()
    {
        return $this->morphOne(GameStatistic::class, 'gameable')->latestOfMany();
    }
}
