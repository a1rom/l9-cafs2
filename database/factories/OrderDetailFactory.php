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
        $productId = fake()->randomElement(
            Product::whereNull('deleted_at')->pluck('id')
        );
        $price = Product::find($productId)->price;
        $isDiscounted = fake()->boolean();
        if ($isDiscounted) {
            $discount = fake()->randomFloat(2, 0, 0.5);
            $price = $price * (1 - $discount);
        } else {
            $discount = 0;
        }
        $discountedPrice = $price - ($price * $discount / 100);

        return [
            'order_id' => Order::all()->random()->id,
            'product_id' => $productId,
            'quantity' => fake()->numberBetween(1, 10),
            'price' => $price,
            'discount' => $discount,
        ];
    }
}
