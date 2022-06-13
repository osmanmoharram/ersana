<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
    ];

    protected $with = ['bookingTime'];

    public function bookingTime()
    {
        return $this->belongsTo(BookingTime::class, 'bookingTime_id');
    }

    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = $value * 100;
    }

    public function getTotalAttribute()
    {
        return $this->attributes['total'] / 100;
    }

    public function setPaidAmountAttribute($value)
    {
        $this->attributes['paid_amount'] = $value * 100;
    }

    public function getPaidAmountAttribute()
    {
        return $this->attributes['paid_amount'] / 100;
    }

    public function setRemainingAmountAttribute($value)
    {
        $this->attributes['remaining_amount'] = $value * 100;
    }

    public function getRemainingAmountAttribute()
    {
        return $this->attributes['remaining_amount'] / 100;
    }
}
