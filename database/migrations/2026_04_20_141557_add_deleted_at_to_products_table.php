<?php
// File: database/migrations/XXXX_XX_XX_XXXXXX_add_deleted_at_to_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('products', function (Blueprint $table) {
            // $table->softDeletes() otomatis buat kolom 'deleted_at' TIMESTAMP NULL
            // Laravel akan mengisi kolom ini saat $model->delete() dipanggil
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::table('products', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};