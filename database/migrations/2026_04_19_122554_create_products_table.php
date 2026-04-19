<?php
// File: database/migrations/XXXX_XX_XX_XXXXXX_create_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);           // Format: total 10 digit, 2 di belakang koma
            $table->unsignedBigInteger('category_id'); // Tipe data harus sama dengan $table->id() di tabel referensi
            
            // Foreign Key Constraint: Menghubungkan ke tabel product_categories
            // onDelete('cascade') → Jika kategori dihapus, produk terkait ikut terhapus otomatis
            $table->foreign('category_id')
                  ->references('id')
                  ->on('product_categories')
                  ->onDelete('cascade');
                  
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('products');
    }
};