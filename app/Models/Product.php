<?php
// File: app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // ← Trait untuk soft delete
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model {
    // ✅ Aktifkan fitur soft delete
    use SoftDeletes;

    // ✅ Kolom yang BOLEH diisi via mass assignment (create/update)
    // Kolom lain (id, created_at, updated_at, deleted_at) otomatis dihandle Laravel
    protected $fillable = [
        'name', 'description', 'price', 'stock', 'category_id', 'image_path'
    ];

    // 🔹 Relasi ke kategori (sudah ada dari Week 7.2)
    public function product_category(): BelongsTo {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}