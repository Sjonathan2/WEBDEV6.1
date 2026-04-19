<?php
// File: app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    
    // Method untuk menampilkan halaman home
    public function show() {
        // Data statis yang ingin kita kirim ke View
        $product_name = 'Logitech Superlight';
        $category = 'Mouse';
        $button_html = '<button class="btn btn-primary">Beli Sekarang</button>';
        
        // Mengirim data ke view('home')
        // Format: return view('nama_file', ['nama_variabel_di_view' => $nilai_data]);
        return view('home', [
            'product_name' => $product_name,    // Di view nanti diakses pakai {{ $product_name }}
            'product_category' => $category,    // Di view nanti diakses pakai {{ $product_category }}
            'button' => $button_html            // Di view nanti diakses pakai {!! $button !!}
        ]);
    }
}