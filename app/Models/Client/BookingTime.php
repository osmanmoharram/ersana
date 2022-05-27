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

    protected function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    protected function getPriceAttribute($value)
    {
        return $this->attributes['price'] = $value / 100;
    }
}
