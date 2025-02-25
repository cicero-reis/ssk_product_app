<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->randomNumber(),
            'name' => fake()->unique()->word(),
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2, 0, 100),
            'category_id' => fn () => 1, // Garante que será tratado corretamente
            'image_url' => fake()->imageUrl(),
            'image_filename' => fake()->word(),
        ];
    }
}
