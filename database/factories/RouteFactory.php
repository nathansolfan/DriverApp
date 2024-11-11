<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'pickup_location' => $this->faker->city(),
            'dropoff_location' => $this->faker->city(),
            'schedule_time' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'status' => 'scheduled', // Keep the status as "scheduled" for simplicity
        ];
    }
}
