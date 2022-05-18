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
}
