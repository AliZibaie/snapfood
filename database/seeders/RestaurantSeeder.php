<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurant = Restaurant::factory()->create([
            'phone'=>'09190728073',
            'account_number'=>'0919072807',
            'shipping_cost'=>1500,
            'name'=>'Restaurant1',
            'user_id'=>2,
        ]);
        $restaurant->restaurantCategories()->sync([1, 2, 3, 4, 5]);
    }
}
