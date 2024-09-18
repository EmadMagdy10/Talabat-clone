<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurant_id' => Restaurant::inRandomOrder()->first()->id,
            'name' => $this->faker->firstName(),
            'type' => $this->faker->firstName(),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->words(10, true),
            'price' => $this->faker->numberBetween(100, 100000),
        ];
    }
}
