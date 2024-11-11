<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Route;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, // Assign a user at random
            'route_id' => Route::inRandomOrder()->first()->id, // Assign a route at random
            'seat_count' => $this->faker->numberBetween(1, 5),
            'status' => 'pending', // Start all bookings with a "pending" status
        ];
    }
}
