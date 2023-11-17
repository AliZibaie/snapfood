<?php

namespace Database\Seeders;

use App\Models\RestaurantCategory;
use Database\Factories\RestaurantCategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       RestaurantCategory::factory()->count(20)->create();
    }
}
