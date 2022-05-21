<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date' => 'datetime'
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
