<?php
// File: database/migrations/XXXX_XX_XX_XXXXXX_update_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('products', function (Blueprint $table) {
            // Tambah kolom stock (default 0)
            $table->integer('stock')->default(0);
            // Tambah kolom image_path (nullable untuk gambar produk)
            $table->string('image_path')->nullable();
        });
    }

    public function down(): void {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['stock', 'image_path']);
        });
    }
};