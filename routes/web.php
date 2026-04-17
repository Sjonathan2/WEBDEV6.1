<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // dd() = "Dump and Die" → tool debugging Laravel
    // Menampilkan isi variabel lalu STOP eksekusi (berguna untuk cek data)
    dd('Hello World!');  // ← Coba akses http://webdev.test, akan muncul teks ini
});

Route::get('/home', function () {
    return view('home');  // ← Memanggil resources/views/home.blade.php
})->name('home');  // ← Named route: memudahkan referensi URL di kode

// Contoh penggunaan dd() untuk debugging:

Route::get('/test', function () {
    $data = ['name' => 'Budi', 'age' => 20];
    
    dd($data);  // ← Akan menampilkan isi $data dalam format rapi, lalu STOP
    
    // Kode di bawah ini TIDAK akan dijalankan:
    return view('home');
});