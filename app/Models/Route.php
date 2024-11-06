<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    // Relationship: a route has many bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
