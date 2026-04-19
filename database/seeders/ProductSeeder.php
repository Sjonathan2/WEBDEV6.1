<?php
// File: database/seeders/ProductSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder {
    public function run(): void {
        // Data produk (category_id 1=Electronics, 2=Clothing, 3=Books)
        $products = [
            ['name' => 'iPhone 15 Pro Max', 'description' => 'Apple flagship smartphone with A17 Pro chip', 'price' => 20499000, 'stock' => 45, 'category_id' => 1],
            ['name' => 'Samsung Galaxy S24 Ultra', 'description' => 'Premium Android phone with AI features', 'price' => 18799000, 'stock' => 40, 'category_id' => 1],
            ['name' => 'MacBook Pro M3', 'description' => 'Apple laptop powered by M3 chip', 'price' => 33999000, 'stock' => 20, 'category_id' => 1],
            ['name' => 'Sony WH-1000XM5', 'description' => 'Industry-leading noise cancelling headphones', 'price' => 5999000, 'stock' => 55, 'category_id' => 1],
            ['name' => 'Uniqlo Oversized T-Shirt', 'description' => 'Comfortable oversized cotton t-shirt', 'price' => 199000, 'stock' => 120, 'category_id' => 2],
            ['name' => 'Nike Tech Fleece Hoodie', 'description' => 'Lightweight and warm hoodie', 'price' => 2199000, 'stock' => 80, 'category_id' => 2],
            ['name' => "Levi's 501 Original Jeans", 'description' => 'Classic straight fit denim jeans', 'price' => 1199000, 'stock' => 60, 'category_id' => 2],
            ['name' => 'Atomic Habits', 'description' => 'Bestselling self-improvement book by James Clear', 'price' => 299000, 'stock' => 150, 'category_id' => 3],
            ['name' => 'The Psychology of Money', 'description' => 'Timeless lessons on wealth and happiness', 'price' => 249000, 'stock' => 130, 'category_id' => 3],
            ['name' => 'Laravel 11 From Scratch', 'description' => 'Comprehensive guide to building modern Laravel apps', 'price' => 399000, 'stock' => 70, 'category_id' => 3],
        ];

        // Tambahkan timestamp secara otomatis sebelum insert
        $now = now();
        foreach ($products as &$product) {
            $product['created_at'] = $now;
            $product['updated_at'] = $now;
        }

        // Insert ke database
        DB::table('products')->insert($products);
    }
}