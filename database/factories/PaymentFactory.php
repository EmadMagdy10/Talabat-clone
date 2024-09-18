<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
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
            'amount'=>$this->faker->numberBetween(100,100000),
            'transaction_id'=>$this->faker->unique()->numberBetween(100,100000),
            'payment_method'=>$this->faker->word,
        ];
    }
}
