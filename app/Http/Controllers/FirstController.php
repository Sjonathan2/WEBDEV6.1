<?php
// File: app/Http/Controllers/FirstController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // ← Wajib import Request untuk menangkap parameter

class FirstController extends Controller {
    
    // 🔹 Method untuk penjumlahan (2 parameter WAJIB)
    public function sum(Request $request) {
        // $request->param1 mengambil nilai dari segmen URL pertama
        // Contoh: URL /math/sum/10/5 -> param1 = 10
        $a = $request->param1;
        
        // $request->param2 mengambil nilai dari segmen URL kedua
        // Contoh: URL /math/sum/10/5 -> param2 = 5
        $b = $request->param2;
        
        // Lakukan operasi matematika
        $total = $a + $b;
        
        // Return hasil langsung ke browser
        return "Jumlah: " . $total;
    }

    // 🔹 Method untuk pengurangan (param2 OPSIONAL)
    public function sub(Request $request) {
        // Param1 WAJIB ada
        $a = $request->param1;
        
        // Cek apakah param2 ada di URL?
        // isset() mengembalikan true jika variabel ada, false jika tidak
        if (isset($request->param2)) {
            $b = $request->param2;
        } else {
            $b = 0; // Jika user tidak isi param2, default ke 0
        }
        
        $total = $a - $b;
        
        return "Selisih: " . $total;
    }
}