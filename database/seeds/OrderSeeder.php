<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 1; $i++) {
            // $date = CaCarbonrbon::create(2015, 5, 28, 0, 0, 0);
            Order::create([
                'period' => 5,
                'user_id' => 1,
                'category_id' => 1,
                'status' => 'ordered'
            ]);
        }
    }
}
