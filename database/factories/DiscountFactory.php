<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label'=>$this->faker->unique()->randomNumber(2),
            'code'=>rand(10000, 99999),
            'expires_at'=>$this->faker->dateTimeBetween('now', '15days'),
        ];
    }
}
