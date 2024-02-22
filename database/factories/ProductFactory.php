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
            //
            'name' => fake()->name(),
            'details' => fake()->sentence(8),
            'price' => fake()->numberBetween(100, 2000),
            'quantity' => fake()->numberBetween(1, 10),
            'image' => 'product-img.png'
        ];
    }
}
