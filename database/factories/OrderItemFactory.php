<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order_Item>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::InRandomOrder()->first()->id,
            'menu_id' => Menu::InRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->numberBetween(100, 100000),
        ];
    }
}
