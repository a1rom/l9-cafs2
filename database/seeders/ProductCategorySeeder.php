<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Electronics',
            'Books',
            'Movies',
            'Music',
            'Games',
            'Software',
        ];

        foreach ($categories as $category) {
            ProductCategory::create([
                'name' => $category,
            ]);
        }
    }
}
