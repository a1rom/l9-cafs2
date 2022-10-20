<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Filters\ProductFilter;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $productSorter = [
        'name-asc' => 'Name ASC',
        'name-desc' => 'Name DESC',
        'price-asc' => 'Price ASC',
        'price-desc' => 'Price DESC',
    ];

    public function index(Request $request)
    {
        $query = DB::table('products');
        dump('start');
        if ($request->has('category') && $request->get('category') !== 'Select a category') {
            dump('category');
            $query->where('category_id', $request->get('category'));
        }

        if ($request->has('search')) {
            dump('search');
            $query->where('name', 'like', '%' . $request->get('search') . '%');
        }

        if ($request->has('sort') && $request->get('sort') !== 'Sort by') {
            dump('sort');
            list($field, $direction) = explode('-', $request->get('sort'));
            $query->orderBy($field, $direction);
        }

        $products = $query->dump();
        // dd($products);
        $products = $query->get();

        return view('shop', [
            'categories' => ProductCategory::get(),
            'products' => $products,
            'sorting' => $this->productSorter,
        ]);
    }
}
