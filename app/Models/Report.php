<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'from' => 'date',
        'to' => 'date'
    ];

    protected function setAverageAttribute($value)
    {
        $this->attributes['average'] = $value * 100;
    }

    protected function getAverageAttribute()
    {
        return $this->attributes['average'] / 100;
    }

    protected function setTotalAttribute($value)
    {
        $this->attributes['total'] = $value * 100;
    }

    protected function getTotalAttribute()
    {
        return $this->attributes['total'] / 100;
    }
}
