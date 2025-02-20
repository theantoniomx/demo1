<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Number;

class Property extends Model
{
    use HasFactory;

    /**
     * Get the property type that owns the property.
    */
    public function list_type(): BelongsTo
    {
        return $this->belongsTo(PropertyListingType::class, 'property_listing_types_id');
    }

    /**
     * Get the city that owns the property.
    */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getPriceAsCurrency(){
        $formattedPrice = Number::currency($this->price);
        return rtrim(rtrim($formattedPrice, '0'), '.');
    }

    public function getPriceBySquareFeet(){
        return Number::currency($this->price / $this->sq_ft);
    }
}
