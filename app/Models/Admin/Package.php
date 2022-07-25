<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    /**
     * The attributes that should be guarded.
     *
     * @var array<string, string>
    */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
    */
    protected $casts = [
        'price' => 'integer'
    ];

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    protected function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    protected function getPriceAttribute()
    {
        return $this->attributes['price'] / 100;
    }
}
