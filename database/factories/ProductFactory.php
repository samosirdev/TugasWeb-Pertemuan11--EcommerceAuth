<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
        'category_id' => Category::factory(),
        'name'        => fake()->words(3, true),
        'slug'        => fake()->unique()->slug(),
        'description' => fake()->paragraph(3),
        'price'       => round(fake()->numberBetween(25000, 3000000), -3), // kelipatan 1000
        'stock'       => fake()->numberBetween(0, 150),
        'is_active'   => fake()->boolean(90),
    ];
}
}
