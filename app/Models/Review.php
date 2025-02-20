<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'name',
        'email',
        'description',
        'date',
        'rating',
        'property_id',
    ];

    protected $casts = [
        'date' => 'datetime', 
    ];

    public function property(): BelongsTo {
        return $this->belongsTo(Property::class);
    }
}
