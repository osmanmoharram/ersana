<?php

namespace App\Models\Admin;

use App\Models\Client\Hall;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    protected $with = 'user';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function businessField()
    {
        return $this->belongsTo(BusinessField::class);
    }

    public function halls()
    {
        return $this->hasMany(Hall::class);
    }
}
