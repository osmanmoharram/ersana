<?php

namespace App\Models\Admin;

use App\Models\Hall;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

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
