<?php

namespace App\Models;

use App\Models\Admin\BusinessField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    public function businessField()
    {
        return $this->belongsTo(BusinessField::class, 'business_field_id');
    }
    
    protected function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    protected function getPriceAttribute($value)
    {
        $this->attributes['price'] = $value / 100;
    }
}
