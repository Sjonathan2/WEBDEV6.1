{{-- File: resources/views/home.blade.php --}}
{{-- @extends: mewarisi layout dari base.blade.php --}}
{{-- Path 'base.base' artinya: folder base/ → file base.blade.php --}}
@extends('base.base')

{{-- @section('title'): override title default di <head> base layout --}}
@section('title', 'Home - ISB Commerce')

{{-- @section('content'): mengisi slot @yield('content') di base layout --}}
@section('content')
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Selamat Datang di ISB Commerce</h1>
        <p class="lead text-muted">Platform pembelajaran Sistem Informasi Bisnis</p>
    </div>

    {{-- Card produk contoh (data statis dari Controller sebelumnya) --}}
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Produk: {{ $product_name ?? 'Logitech Superlight' }}</h5>
                    <p class="card-text text-muted">Kategori: {{ $product_category ?? 'Mouse' }}</p>
                    {{-- Output raw HTML untuk tombol --}}
                    <p>{!! $button ?? '<button class="btn btn-primary">Beli Sekarang</button>' !!}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card h-100 shadow-sm bg-light">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <p class="mb-0 text-muted">Area konten dinamis lainnya akan ditampilkan di sini.</p>
                </div>
            </div>
        </div>
    </div>
    <h3 class="mb-4">Kategori Produk & Jumlah Item</h3>
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($product_categories as $category)
        <div class="col">
            <div class="card text-center p-3">
                <h5 class="card-title">{{ $category->name }}</h5>
                <p class="card-text text-muted">{{ $category->description }}</p>
                
                {{-- Akses hasil withCount: $category->products_count --}}
                <p class="fw-bold">Total Produk: {{ $category->products_count }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection