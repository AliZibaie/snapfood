<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'longitude'=>$this->faker->longitude(),
            'latitude'=>$this->faker->latitude(),
            'title'=>$this->faker->title(),
            'address'=>$this->faker->text(),
            'addressable_id'=>1,
            'addressable_type'=>'App\Models\Restaurant',
        ];
    }
}
