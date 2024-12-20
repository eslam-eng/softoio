<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(5)->create();
         \App\Models\Product::factory(20)->create();
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderItemsTableSeeder::class);
    }
}
