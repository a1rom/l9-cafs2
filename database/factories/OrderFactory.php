<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

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
    public function definition()
    {
        $deliveryAddress = Address::factory()->create()->id;

        $randomDigit = fake()->randomDigit();
        if ($randomDigit > 2) {
            $invoiceAddress = $deliveryAddress;
        } else {
            $invoiceAddress = Address::factory()->create()->id;
        }

        return [
            'user_id' => User::factory()->create()->id,
            'delivery_address_id' => $deliveryAddress,
            'invoice_address_id' => $invoiceAddress,
            'status' => fake()
                ->randomElement(
                    [
                        'pending',
                        'processing',
                        'shipped',
                        'delivered',
                        'cancelled'
                    ]
                ),
        ];
    }
}
