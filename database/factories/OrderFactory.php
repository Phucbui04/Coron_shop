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
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'payment_method' => $this->faker->randomElement(['Cash', 'Credit Card', 'PayPal']),
            'buy_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'status' => rand(1,5),
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
        ];
    }
}
