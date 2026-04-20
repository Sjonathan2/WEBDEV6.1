{{-- File: resources/views/store.blade.php --}}
@extends('base.base')

@section('title', 'Store - ISB Commerce')

@section('content')
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Halaman Store</h1>
        <p class="lead text-muted">Daftar produk tersedia (Stok > 0)</p>
    </div>

    {{-- Grid layout Bootstrap: 3 kolom di desktop, 1 kolom di mobile --}}
    <div class="row row-cols-1 row-cols-md-3 g-4">
        
        {{-- Loop setiap produk yang dikirim dari Controller --}}
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        {{-- Akses kolom biasa: $product->name --}}
                        <h5 class="card-title">{{ $product->name }}</h5>
                        
                        {{-- Akses Relasi: $product->product_category->name --}}
                        {{-- Laravel otomatis join tabel karena kita sudah definisi belongsTo --}}
                        <p class="card-text text-muted">
                            <i>{{ $product->product_category->name }}</i>
                        </p>
                        
                        {{-- Format harga dengan number_format --}}
                        <p class="card-text fw-bold">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                        
                        {{-- Tampilkan deskripsi/detail --}}
                        <p class="card-text">{{ $product->description }}</p>
                        
                        <span class="badge bg-success">Stok: {{ $product->stock }}</span>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection