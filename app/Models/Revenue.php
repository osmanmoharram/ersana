<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'date' => 'date'
    ];

    public function getAmountAttribute($value)
    {
        return $this->attributes['amount'] = $value / 100;
    }

    public function setAmountAttribute($value)
    {
        return $this->attributes['amount'] = $value * 100;
    }
}
