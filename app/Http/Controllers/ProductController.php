<?php
// File: app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Helper untuk manipulasi file storage

class ProductController extends Controller {
    
    // ✅ INDEX: Tampilkan daftar semua produk
    public function index() {
        // Eager loading relasi kategori + urutkan terbaru
        $products = Product::with('product_category')->latest()->get();
        return view('products.index', compact('products'));
    }

    // ✅ CREATE: Tampilkan form tambah produk
    public function create() {
        // Ambil semua kategori untuk opsi <select> di form
        $categories = ProductCategory::all();
        return view('products.create', compact('categories'));
    }

    // ✅ STORE: Simpan produk baru ke database
    public function store(Request $request) {
        // 1. Validasi input request
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:product_categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Max 2MB
        ]);

        // 2. Handle file upload jika user memilih gambar
        if ($request->hasFile('image')) {
            // store() otomatis generate nama unik & simpan ke storage/app/public/images/
            // Return value: path relatif seperti "images/abc123.jpg"
            $validated['image_path'] = $request->file('image')->store('images', 'public');
        }

        // 3. Insert data ke database (mass assignment)
        Product::create($validated);

        // 4. Flash message sukses & redirect ke halaman index
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // ✅ EDIT: Tampilkan form edit produk yang sudah ada
    public function edit(Product $product) {
        $categories = ProductCategory::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // ✅ UPDATE: Perbarui data produk
    public function update(Request $request, Product $product) {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:product_categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Jika ada upload gambar baru, hapus yang lama & simpan yang baru
        if ($request->hasFile('image')) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('images', 'public');
        }

        // Update record di database
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // ✅ DESTROY: Hapus produk (Soft Delete)
    public function destroy(Product $product) {
        // Hapus file gambar fisik dari storage agar tidak menumpuk
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }
        
        // Soft delete: mengisi kolom deleted_at, tidak menghapus baris database
        $product->delete();
        
        return redirect()->route('products.index')->with('danger', 'Produk berhasil dihapus!');
    }
}