<?php
// File: routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FirstController; // ← Import Controller baru

// ... (route sebelumnya tetap ada) ...

// ✅ Route Parameter WAJIB: User HARUS mengisi {param1} dan {param2}
// Contoh URL: http://webdev6.1-6.2.test/math/sum/10/5
Route::get('/math/sum/{param1}/{param2}', [FirstController::class, 'sum'])
    ->name('math.sum');

// ✅ Route Parameter OPSIONAL: {param2} boleh kosong (pakai tanda ?)
// Contoh URL: http://webdev6.1-6.2.test/math/sub/10/3  ATAU  http://webdev6.1-6.2.test/math/sub/10
Route::get('/math/sub/{param1}/{param2?}', [FirstController::class, 'sub'])
    ->name('math.sub');

// ✅ Route memanggil HomeController (Best Practice)
// Kita pindahkan logika view('home') ke dalam Controller
Route::get('/home', [HomeController::class, 'show'])->name('home');

// ✅ Route untuk halaman Store
// Closure sederhana untuk render view tanpa controller dulu
Route::get('/store', function () {
    // view('store') → Laravel otomatis cari file: resources/views/store.blade.php
    return view('store'); 
})->name('store'); 
// ↑ ->name('store') = Named route, memungkinkan pemanggilan route('store') di header

// ✅ Route untuk halaman About
Route::get('/about', function () {
    // view('about') → Laravel otomatis cari file: resources/views/about.blade.php
    return view('about');
})->name('about');
// ↑ ->name('about') = Named route, memungkinkan pemanggilan route('about') di header