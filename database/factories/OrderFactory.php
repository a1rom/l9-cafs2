<?php

namespace Database\Factories;

use App\Models\User;
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
        $address = Address::all()->random()->id;

        return [
            // 'user_id' => User::all()->random()->id,
            'user_id' => fake()->randomElement(
                User::whereNotNull('email_verified_at')->pluck('id')
            ),
            // 'user_id' => User::all()
            //     ->whereNotNull('email_verified_at')
            //     ->random()
            //     ->id,
            'delivery_address_id' => $address,
            'invoice_address_id' => fake()
                ->randomElement(
                    [
                        $address,
                        Address::all()->random()->id
                    ]
                ),
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
