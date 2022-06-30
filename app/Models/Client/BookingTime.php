<?php

namespace App\Models\Client;

use App\Models\Client\Hall;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingTime extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    public function getPriceAttribute()
    {
        return $this->attributes['price'] / 100;
    }
}
