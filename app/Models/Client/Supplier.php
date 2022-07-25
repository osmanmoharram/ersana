<?php

namespace App\Models\Client;

use App\Models\Admin\BusinessField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function businessField()
    {
        return $this->belongsTo(BusinessField::class);
    }
}
