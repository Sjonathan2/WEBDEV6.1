<?php
// File: database/seeders/ProductCategorySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder {
    /**
     * Jalankan saat: php artisan db:seed --class=ProductCategorySeeder
     */
    public function run(): void {
        // Insert multiple records sekaligus menggunakan array
        DB::table('product_categories')->insert([
            [
                'name' => 'Electronics',
                'description' => 'Electronic devices and gadgets',
                'created_at' => now(), // now() = timestamp saat ini
                'updated_at' => now(),
            ],
            [
                'name' => 'Clothing',
                'description' => 'Men and Women apparel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Books',
                'description' => 'Fiction and non-fiction books',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}