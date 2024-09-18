<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::InRandomOrder()->first()->id,
            'restaurant_id' => Restaurant::InRandomOrder()->first()->id,
            'order_number'=> $this->faker->unique()->numberBetween(1000,100000000),
            'total_amount'=> $this->faker->numberBetween(100,100000),
            'status'=> $this->faker->word(),

        ];
    }
}
