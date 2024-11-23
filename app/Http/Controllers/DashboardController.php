<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke()
    {
        //get orders average price
        $avg_orders_price = Order::query()->average('grand_total');
        //get total in specific duration
        $total_orders_in_spacefic_duration = Order::query()->whereBetween('created_date',[now()->subMonth()->format('Y-m-d'),now()->format('Y-m-d')])->sum('grand_total');
        //get product with total orders for this product
        $productsWithOrderSum = Product::query()
            ->withSum('orderItems as total_sales','total')
            ->paginate(10); // Paginate results with 10 products per page

        $bestSellingProducts = Product::withSum('orderItems as total_sales','total')
            ->orderByDesc('total_sales') // Order by total sales in descending order
            ->limit(10) // Limit to top 10 products
            ->get();

        return view('welcome',['avg_orders_price'=>$avg_orders_price,'productsWithOrderSum'=>$productsWithOrderSum,'bestSellingProducts'=>$bestSellingProducts,'total_orders_with_month_from_now'=>$total_orders_in_spacefic_duration]);

    }
}
