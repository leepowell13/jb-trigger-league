<?php

namespace App\Traits;

use App\Models\Season;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait SeasonTrait
{
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }
}
