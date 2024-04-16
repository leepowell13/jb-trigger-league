<?php

namespace App\Models;

use App\Traits\SeasonTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pairing extends Model
{
    use HasFactory;
    use SeasonTrait;

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class)->orderBy('id')->withPivot(['game_wins', 'game_losses', 'pairing_result']);
    }

    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    public function scopeWeek(Builder $query, $week): void
    {
        $query->when($week ?? false, fn ($query, $week) => $query->where('week', $week));
    }

    public function teamNames(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->teams->pluck('name'),
        );
    }

    public function team1(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->teamNames[0],
        );
    }

    public function team2(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->teamNames[1],
        );
    }
}
