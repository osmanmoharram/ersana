<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date' => 'date'
    ];

    public function getAmountAttribute()
    {
        return $this->attributes['amount'] / 100;
    }

    public function setAmountAttribute($value)
    {
        return $this->attributes['amount'] = $value * 100;
    }
}
