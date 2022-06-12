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

    public function getFormattedTotalAttribute()
    {
        return number_format($this->attributes['total'] / 100, 2);
    }

    public function setPaidAmountAttribute($value)
    {
        $this->attributes['paid_amount'] = $value * 100;
    }

    public function getFormattedPaidAmountAttribute()
    {
        return number_format($this->attributes['paid_amount'] / 100, 2);
    }

    public function setRemainingAmountAttribute($value)
    {
        $this->attributes['remaining_amount'] = $value * 100;
    }

    public function getRemainingAmountAttribute($value)
    {
        return number_format($this->attributes['remaining_amount'] = $value / 100, 2);
    }
}
