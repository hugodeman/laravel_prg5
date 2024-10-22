<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;

class Chord extends Model
{
    public function fret():BelongsTo
    {
        return $this->belongsTo(Fret::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

