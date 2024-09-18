<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product_Category>
 */
class Product_CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'menu_id' => Menu::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,

        ];
    }
}
