<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Route;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // Create 10 Routes
        Route::factory(10)->create();

        // Create 20 bookings associated with users and routes
        Booking::factory(20)->create();

        // Create 15payments associated with bookings
        Payment::factory(15)->create();


        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
