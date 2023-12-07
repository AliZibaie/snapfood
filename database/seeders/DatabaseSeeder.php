<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           PermissionSeeder::class,
            RestaurantCategorySeeder::class,
            FoodCategorySeeder::class,
            DiscountSeeder::class,
            RestaurantSeeder::class,
            FoodSeeder::class,
            ScheduleSeeder::class,
            AddressSeeder::class,
        ]);
    }
}
