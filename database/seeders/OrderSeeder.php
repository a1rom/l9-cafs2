<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory(6)
            ->has(User::factory())
            ->has(Address::factory(), 'deliveryAddress')
            ->has(Address::factory(), 'invoiceAddress')
            ->hasOrderDetails(3)
            ->create();
    }
}
