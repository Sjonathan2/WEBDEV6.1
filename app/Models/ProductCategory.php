<?php
// File: app/Models/ProductCategory.php

namespace App\Models;

// Import class Model dasar dari Laravel
use Illuminate\Database\Eloquent\Model;
// Import Relasi HasMany untuk koneksi ke tabel products
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model {
    
    // ✅ Karena tabel kita bernama 'product_categories' (sesuai konvensi Laravel),
    // kita TIDAK PERLU tulis protected $table. Laravel otomatis mencocokkannya.
    
    // 🔹 Definisikan Relasi: 1 Kategori punya BANYAK Produk
    public function products(): HasMany {
        // hasMany(ModelTujuan, 'nama_kolom_foreign_key_di_tabel_tujuan')
        // Di tabel products, kolom foreign key kita beri nama 'category_id'
        return $this->hasMany(Product::class, 'category_id');
    }
}