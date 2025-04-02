<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'car_id',
        'user_id',
        'startDate',
        'endDate',
    ];
    
    public function car() {
        
        return $this->belongsTo(Car::class);
    }
}