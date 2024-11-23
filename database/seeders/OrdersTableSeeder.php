<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::all();

        // Loop over each user to create 10 orders
        foreach ($users as $user) {
            // Create 10 orders for each user
            for ($start = 1; $start <= 5; $start++) {
                // Generate a random grand total for each order
                $sub_total = $grand_total = $faker->randomFloat(2, 20, 500); // Random grand total between 20 and 500

                Order::create([
                    'user_id' => $user->id,
                    'grand_total' => $grand_total,
                    'sub_total' => $sub_total,
                ]);
            }
        }
    }
}
