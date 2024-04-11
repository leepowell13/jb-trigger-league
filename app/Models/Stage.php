<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    public function pairings()
    {
        return $this->hasMany(Pairing::class);
    }
}
