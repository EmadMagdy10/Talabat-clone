<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Food',
            'image' => url('https://dmrqkbkq8el9i.cloudfront.net/Pictures/380x253/5/9/4/294594_2r0h5jr11_215876.jpg'),
        ]);
        Category::create([
            'name' => 'Market',
            'image' => url('https://www.editamimarlik.com/wp-content/uploads/2023/01/market-tasarim-edita-mimarlik-20-1.jpg'),
        ]);
        Category::create([
            'name' => 'Pharmacy',
            'image' => url('https://media.capc.org/images/AdobeStock_274131656.original.original.jpg'),
        ]);
    }
}
