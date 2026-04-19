{{-- File: resources/views/about.blade.php --}}
@extends('base.base')

@section('title', 'About Us - ISB Commerce')

@section('content')
    <div class="row align-items-center py-5">
        <div class="col-md-6">
            <h1 class="display-5 fw-bold">Tentang ISB Commerce</h1>
            <p class="lead text-muted">Platform pembelajaran Sistem Informasi Bisnis berbasis Laravel.</p>
            <p>Kami menyediakan materi praktik pengembangan web modern dengan standar industri.</p>
        </div>
        <div class="col-md-6 text-center">
            
            {{-- ✅ OPSI 1: Gambar dari folder /public/images --}}
            {{-- asset() helper otomatis generate URL lengkap: http://site.test/images/foto.jpeg --}}
            {{-- Path relatif terhadap folder public/, jadi cukup tulis 'images/foto.jpeg' --}}
            <img src="{{ asset('images/foto.jpeg') }}" 
                 class="img-fluid rounded shadow mb-3" 
                 alt="Static Banner - Public Folder">
            
            <span class="badge bg-secondary">Opsi 1: /public/images</span>
            
        </div>
    </div>
@endsection