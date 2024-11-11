<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Route;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // Consistent Relationship: Bookings are directly related to routes.

    public function run(): void
    {
        // Create Users
        User::factory(5)->create();

        // Create Routes
        $routes = Route::factory(5)->create();

        // Create Bookings for each User
        User::all()->each(function ($user) {
            Route::inRandomOrder()->take(2)->get()->each(function ($route) use ($user) {
                Booking::factory()->create([
                    'user_id' => $user->id,
                    'route_id' => $route->id,
                ]);
            });
        });

        // Create Payments for Confirmed Bookings
        Booking::where('status', 'pending')->get()->each(function ($booking) {
            Payment::factory()->create([
                'booking_id' => $booking->id,
                'status' => 'completed',
            ]);
        });

        // Create a Test User
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
