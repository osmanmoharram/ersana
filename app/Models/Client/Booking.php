<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
        'end_date'
    ];

    protected $with = ['customer'];

    public function customer()
    {
        return client()->run(function () {
            return $this->belongsTo(Customer::class, 'customer_id');
        });
    }
}
