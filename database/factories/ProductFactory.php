<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'sale' => $this->faker->numberBetween(0, 50),
            'description' => $this->faker->paragraph,
            'detail' => $this->faker->text,
            'status' => rand(1,3),
            'category_id' => function () {
                return \App\Models\Category::factory()->create()->id;
            },
        ];
    }
}
