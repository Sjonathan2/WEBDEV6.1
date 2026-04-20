<?php
// File: routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;
use App\Models\ProductCategory;
use App\Http\Controllers\ProductController;

Route::get('/home', function () {
    // withCount(['products']) otomatis menambah kolom virtual 'products_count'
    $product_categories = ProductCategory::withCount(['products'])->get();
    
    return view('home', [
        'product_categories' => $product_categories
    ]);
})->name('home');

// ✅ Route Store: Panggil method show di StoreController
Route::get('/store', [StoreController::class, 'show'])->name('store');

// ✅ Route untuk halaman About
Route::get('/about', function () {
    // view('about') → Laravel otomatis cari file: resources/views/about.blade.php
    return view('about');
})->name('about');
// ↑ ->name('about') = Named route, memungkinkan pemanggilan route('about') di header

Route::resource('products', ProductController::class);