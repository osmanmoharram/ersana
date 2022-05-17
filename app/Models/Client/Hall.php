<?php

namespace App\Models\Client;

use App\Models\Client\BookingTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function bookingTimes()
    {
        return $this->hasMany(BookingTime::class);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    public function getPriceAttribute($value)
    {
        $this->attributes['price'] = $value / 100;
    }
}
