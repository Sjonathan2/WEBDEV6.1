{{-- File: resources/views/store.blade.php --}}
@extends('base.base')

@section('title', 'Store - ISB Commerce')

@section('content')
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Halaman Store</h1>
        <p class="lead text-muted">Daftar produk akan ditampilkan di sini.</p>
    </div>

    <div class="card p-4 shadow-sm">
        <h5 class="card-title">Contoh Gambar Produk (Storage)</h5>
        
        {{-- ✅ OPSI 2: Gambar dari folder /storage/app/public/images --}}
        {{-- Setelah storage:link, Laravel buat symlink: public/storage → storage/app/public --}}
        {{-- Jadi path akses di browser WAJIB diawali 'storage/' --}}
        {{-- asset('storage/images/foto.jpeg') → http://site.test/storage/images/foto.jpeg --}}
        <img src="{{ asset('storage/images/foto.jpeg') }}" 
             class="img-fluid rounded shadow mb-3" 
             alt="Dynamic Product - Storage Folder">
        
        <span class="badge bg-primary">Opsi 2: /storage/app/public/images</span>
        <p class="text-muted small mt-2">
            File fisik ada di: <code>storage/app/public/images/</code><br>
            Akses web lewat: <code>public/storage/images/</code> (symlink)
        </p>
    </div>
@endsection