<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name.'Food',
            'raw_materials'=>$this->faker->text.'FoodMaterial',
            'price'=>rand(1000, 100000),
            'restaurant_id'=>1,
            'discount_id'=>rand(1, 5),
        ];

    }
}
