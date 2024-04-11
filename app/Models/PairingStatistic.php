<?php

namespace App\Models;

use App\Traits\SeasonTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PairingStatistic extends Model
{
    use HasFactory;
    use SeasonTrait;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
