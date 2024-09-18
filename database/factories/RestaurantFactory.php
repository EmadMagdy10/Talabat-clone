<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'phone' => $this->faker->phoneNumber(),
            'admin_id' => Admin::inRandomOrder()->first()->id,
            'logo' => $this->faker->imageUrl(),
            'address' => $this->faker->address(),
            'cuisine' => $this->faker->word(),
            'tax_number' => $this->faker->numberBetween(50000, 50000000),
        ];
    }
}
