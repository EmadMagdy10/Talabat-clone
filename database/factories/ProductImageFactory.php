<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product_Image>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'menu_id' => Menu::InRandomOrder()->first()->id,
            'image_path' => $this->faker->imageUrl()
        ];
    }
}
