<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'route_id',
        'seat_count',
        'status',
    ];

    // relationship: a booking belongs to a USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationshio: a bookings belongs to a ROUTE
    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    // relationship: a booking has one payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
