<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bookings()
    {
        return client()->run(function () {
            return $this->hasMany(Booking::class, 'customer_id');
        });
    }

    public static function findOrNull($id)
    {
        return $id ? Static::find($id) : null;
    }
}
