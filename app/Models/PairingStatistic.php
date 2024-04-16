<?php

namespace App\Models;

use App\Traits\SeasonTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PairingStatistic extends Model
{
    use HasFactory;
    use SeasonTrait;

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
