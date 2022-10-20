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
    public function definition()
    {
        return [
            'sku' => fake()->unique()->numerify('SKU######'),
            'ean' => fake()->unique()->ean13(),
            'name' => fake()->word(),
            'category_id' => fake()->numberBetween(1, 6),
            'price' => fake()->randomFloat(2, 10, 80),
            'description' => fake()->text(),
            'details' => json_encode(fake()->words()),
            'deleted_at' => fake()->optional()->dateTimeThisDecade(),
        ];
    }
}
