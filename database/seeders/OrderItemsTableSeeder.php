<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Get all products from your products table
        $products = Product::all();

        // Assuming you're passing an $order_id from the OrdersTableSeeder
        $orders = Order::all();

        foreach ($orders as $order) {
            // Randomly create order items for each order
            foreach ($products->take(3) as $product) {
                // Example: 3 items per order
                $price = $faker->randomFloat(2, 10, 100);
                $qty =  $faker->numberBetween(1, 5);
                OrderItem::create([
                    'order_id' => $order->id, // Use the order's id
                    'product_id' => $product->id,
                    'price' => $price, // Random price for the product
                    'qty' => $qty, // Random quantity (1 to 5)
                    'total' => $qty * $price, // Random quantity (1 to 5)
                ]);
            }
        }
    }
}
