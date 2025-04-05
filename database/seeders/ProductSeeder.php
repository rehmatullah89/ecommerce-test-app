<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run() {
        Product::create([
            'name' => 'Cool T-shirt',
            'slug' => 'cool-t-shirt',
            'description' => 'A very cool T-shirt.',
            'price' => 25.99,
            'stock' => 50,
            'image' => 'https://via.placeholder.com/150'
        ]);

        Product::create([
            'name' => 'Mug with Quote',
            'slug' => 'mug-with-quote',
            'description' => 'Inspirational coffee mug.',
            'price' => 12.50,
            'stock' => 100,
            'image' => 'https://via.placeholder.com/150'
        ]);
    }
}
