<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'user_id' => \App\Models\User::factory(),
        'amount' => $this->faker->randomFloat(2, 10, 500),
        'status' => $this->faker->randomElement(['completed', 'pending', 'cancelled']),
        'order_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
    ];
}
}
