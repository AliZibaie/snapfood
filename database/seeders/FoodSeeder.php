<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = Food::factory(20)->create();
        foreach ($foods as $food) {
            $food->foodCategories()->sync([1, 2, 3, 4, 5]);
        }
    }
}
