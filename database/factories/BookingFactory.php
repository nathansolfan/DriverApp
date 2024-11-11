<?php

namespace Database\Factories;

use App\Models\Route;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'route_id' => Route::inRandomOrder()->first()->id,
            'status' => 'confirmed',
            // 'status' => $this->faker->randomElement(['Pending', 'Confirmed', 'Cancelled']),
            'seat_count' => $this->faker->numberBetween(1,4),
        ];
    }
}
