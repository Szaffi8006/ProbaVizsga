<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'lincensePlate',
        'year',
        'dailyPrice',
    ];

    public function booking() {
        return $this->hasMany(Booking::class);
    }
}
