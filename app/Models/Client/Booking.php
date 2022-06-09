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

    protected $with = ['bookingTime', 'customer'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function bookingTime()
    {
        return $this->belongsTo(BookingTime::class, 'bookingTime_id');
    }

    protected function setTotalAttribute($value)
    {
        $this->attributes['total'] = $value * 100;
    }

    protected function getTotalAttribute($value)
    {
        return $this->attributes['total'] = $value / 100;
    }
    protected function setPaidAmountAttribute($value)
    {
        $this->attributes['paid_amount'] = $value * 100;
    }

    protected function getPaidAmountAttribute($value)
    {
        return $this->attributes['paid_amount'] = $value / 100;
    }
    protected function setRemainingAmountAttribute($value)
    {
        $this->attributes['remaining_amount'] = $value * 100;
    }

    protected function getRemainingAmountAttribute($value)
    {
        return $this->attributes['remaining_amount'] = $value / 100;
    }
}
