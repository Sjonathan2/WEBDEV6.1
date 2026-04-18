<?php
// File: routes/web.php
// Route mendefinisikan URL pattern dan handler-nya

use Illuminate\Support\Facades\Route; // Import facade Route dari Laravel

// ✅ Route 1: Return string langsung (untuk testing cepat)
// Ketika user buka: http://webdev6.1.test/hi
// Laravel akan menampilkan teks "Hi All!"
Route::get('/hi', function () {
    // return string = output langsung ke browser
    return "Hi All!"; 
})->name('hi'); // ->name() = "Named Route" (memberi nama unik untuk referensi URL nanti)

// ✅ Route 2: Route lain dengan nama berbeda
// Akses: http://webdev6.1.test/hello
Route::get('/hello', function () {
    return "Hello All!";
})->name('hello');

// ✅ Route 3: Mengarahkan ke View (akan kita buat di Tutorial 2)
// Akses: http://webdev6.1.test/home
Route::get('/home', function () {
    // view('home') = Laravel otomatis cari file: resources/views/home.blade.php
    // Jika file tidak ada, akan error "View [home] not found"
    return view('home');
})->name('home');