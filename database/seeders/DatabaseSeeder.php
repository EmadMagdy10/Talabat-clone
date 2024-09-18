<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\Admin::factory(10)->create();
        \App\Models\Restaurant::factory(10)->create();
        \App\Models\Menu::factory(10)->create();
        \App\Models\Order::factory(10)->create();
        \App\Models\OrderItem::factory(10)->create();
        \App\Models\Product_Category::factory(10)->create();
        \App\Models\Payment::factory(10)->create();
        \App\Models\ProductImage::factory(10)->create();
        \App\Models\Favorite::factory(10)->create();
        \App\Models\Review::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'first_name' => 'emad',
        //     'last_name' => 'magdy',
        //     'phone' => '123456',
        //     'email' => 'emad@mail.com',
        //     'password' => md5('12345678'),
        // ]);
    }
}
