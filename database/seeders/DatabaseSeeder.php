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
    public function run(): void
    {
        // Create 5 Users
        User::factory(5)->create();

        // Create 5 Routes
        $routes = Route::factory(5)->create();

        // Create 1 booking per route
        $routes->each(function ($route) {
            Booking::factory()->create([
                'route_id' => $route->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
        });

        // Create 1 payment per booking
        Booking::all()->each(function ($booking) {
            Payment::factory()->create([
                'booking_id' => $booking->id,
            ]);
        });

        // Create a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
