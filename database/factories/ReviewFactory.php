<?php

namespace Database\Factories;
use App\Models\User;   
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'user_id'    => User::inRandomOrder()->value('id'),
        'product_id' => Product::inRandomOrder()->value('id'),
        'rating'     => fake()->numberBetween(3, 5),
        'comment'    => fake()->randomElement([
            'Barang sesuai deskripsi, pengiriman cepat!',
            'Kualitas bagus untuk harganya.',
            'Packing rapi, penjual responsif.',
            'Sesuai ekspektasi, recommended.',
            'Lumayan, cuma pengirimannya agak lama.',
        ]),
    ];
}
}
