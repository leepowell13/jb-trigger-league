<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stage extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    public function pairings(): HasMany
    {
        return $this->hasMany(Pairing::class);
    }
}
