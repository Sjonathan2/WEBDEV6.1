<?php
// File: app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Import Relasi BelongsTo untuk koneksi balik ke tabel product_categories
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model {
    
    // 🔹 Definisikan Relasi: 1 Produk milik SATU Kategori
    public function product_category(): BelongsTo {
        // belongsTo(ModelReferensi, 'nama_kolom_foreign_key_di_tabel_ini')
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}