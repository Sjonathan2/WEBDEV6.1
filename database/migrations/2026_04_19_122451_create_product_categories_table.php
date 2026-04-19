<?php
// File: database/migrations/XXXX_XX_XX_XXXXXX_create_product_categories_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Jalankan saat: php artisan migrate
     */
    public function up(): void {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();                              // Primary key auto increment
            $table->string('name')->unique();          // VARCHAR(255), tidak boleh duplikat
            $table->text('description')->nullable();   // TEXT, boleh kosong/null
            $table->timestamps();                      // Otomatis: created_at & updated_at
        });
    }

    /**
     * Jalankan saat: php artisan migrate:rollback
     */
    public function down(): void {
        // Hapus tabel jika rollback
        Schema::dropIfExists('product_categories');
    }
};