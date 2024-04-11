<?php

namespace App\Models;

use App\Traits\SeasonTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class GameStatistic extends Model
{
    use HasFactory;
    use SeasonTrait;

    public function gameable(): MorphTo
    {
        return $this->morphTo();
    }

    public function winPercentage(): Attribute
    {
        return Attribute::make(
            get: fn () => bcdiv($this->wins, $this->played, 4) * 100,
        );
    }

    public function gameDiff(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->wins - $this->losses,
        );
    }
}
