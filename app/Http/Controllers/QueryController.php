<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function queryCountProducts ()
    {
        $count = DB::table('products')->count();
        dd($count);
    }

    public function allProductsSortedByName ()
    {
        $products = DB::table('products')->orderBy('name')->get();
        dd($products);
    }

    public function activeProductsLimitByThreeFromEnd ()
    {
        $products = DB::table('products')
            ->whereNull('deleted_at')
            ->orderByDesc('id')
            ->limit(3)
            ->get();
        dd($products);
    }

    public function selectTwoFirstOrdersAndCountNumberOfProducts ()
    {
        $lastOrders = DB::table('orders')
            ->orderByDesc('id')
            ->limit(5)
            ->get();

        $countProducts = DB::table('order_details')
            ->whereIn('order_id', $lastOrders->pluck('id'))
            ->count();
        dd($countProducts);
    }
}
