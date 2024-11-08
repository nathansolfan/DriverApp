<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Route extends Model
{
    use HasFactory, Notifiable;

    // Add the fillable property
    protected $fillable = [
        'pickup_location',
        'dropoff_location',
        'schedule_time',
        'status'
    ];

    // Relationship: a route has many bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
