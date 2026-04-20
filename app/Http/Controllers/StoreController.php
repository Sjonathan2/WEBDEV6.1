<?php
// File: app/Http/Controllers/StoreController.php

namespace App\Http\Controllers;

// Import Model yang dibutuhkan
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class StoreController extends Controller {
    
    /**
     * Menampilkan halaman store dengan data produk & kategori
     */
    public function show() {
        // ✅ Eager Loading: ::with(['product_category']) mencegah N+1 query problem
        // ✅ Filtering: ->where('stock', '>', 0) hanya tampilkan produk yang stoknya > 0
        $products = Product::with(['product_category'])
                           ->where('stock', '>', 0)
                           ->get();
        
        // Kirim variabel $products ke view 'store'
        return view('store', [
            'products' => $products
        ]);
    }

    /**
     * (Bonus Slide PDF) Menampilkan halaman home dengan count produk per kategori
     */
    public function home() {
        // Ambil semua kategori beserta hitungan jumlah produknya
        $product_categories = ProductCategory::withCount(['products'])->get();
        
        return view('home', [
            'product_categories' => $product_categories
        ]);
    }
}