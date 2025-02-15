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
            'name' => $this->faker->unique()->word(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'category_id' => $this->faker->numberBetween(1, 5),
            'image_url' => $this->faker->imageUrl(),
            'image_filename' => $this->faker->word(),
        ];
    }
}
