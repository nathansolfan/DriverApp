<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'booking_id' => Booking::inRandomOrder()->first()->id, // Assign a booking at random
            'amount' => $this->faker->randomFloat(2, 50, 200),
            'status' => $this->faker->randomElement(['pending', 'completed']),
            'payment_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
