<?php

namespace App\Models;

use App\Models\Client\BookingTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(\App\Models\Admin\Client::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function bookingTimes()
    {
        return $this->hasMany(BookingTime::class);
    }

}
