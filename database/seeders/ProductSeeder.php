<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'img' => 'assets/Products/ipn.jpg',
                'brand' => 'Apple',
                'title' => 'iPhone 15 Pro Max',
                'rating' => 4.9,
                'reviews' => 1250,
                'sellPrice' => 145000,
                'orders' => 850,
                'mrp' => 155000,
                'discount' => 6,
                'category' => 'Mobile',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'img' => 'assets/Products/sam.jpg',
                'brand' => 'Samsung',
                'title' => 'Galaxy S24 Ultra',
                'rating' => 4.8,
                'reviews' => 980,
                'sellPrice' => 139000,
                'orders' => 720,
                'mrp' => 149000,
                'discount' => 7,
                'category' => 'Mobile',
                'created_at' => now(),
                'updated_at' => now(),
            ],            
        ]);
    }
}