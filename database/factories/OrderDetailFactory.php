<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = fake()->randomFloat(2, 10, 100);
        if (fake()->boolean()) {
            $discount = fake()->randomFloat(2, 0, 0.5);
            $price = $price * (1 - $discount);
        } else {
            $discount = 0;
        }
        $discountedPrice = $price - ($price * $discount / 100);

        return [
            'order_id' => Order::factory()->create()->id,
            'product_id' => Product::factory()->create()->id,
            'quantity' => fake()->numberBetween(1, 10),
            'price' => $price,
            'discount' => $discount,
        ];
    }
}
