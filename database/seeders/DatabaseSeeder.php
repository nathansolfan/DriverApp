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
        Route::factory(5)->create();

        // Create 20 Bookings
        Booking::factory(20)->create();

        // Create 15 Payments
        Payment::factory(15)->create();

        // Create a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
