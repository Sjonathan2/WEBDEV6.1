{{-- File: resources/views/about.blade.php --}}
@extends('base.base')

@section('title', 'About Us - ISB Commerce')

@section('content')
    <div class="row align-items-center py-5">
        <div class="col-md-6">
            <h1 class="display-5 fw-bold">Tentang ISB Commerce</h1>
            <p class="lead text-muted">Platform pembelajaran Sistem Informasi Bisnis berbasis Laravel.</p>
            <p>Kami menyediakan materi praktik pengembangan web modern dengan standar industri, mulai dari MVC, Routing, Blade Templating, hingga Database Management.</p>
        </div>
        <div class="col-md-6 text-center">
            {{-- Gambar placeholder menggunakan CDN placehold.co --}}
            <img src="https://placehold.co/600x400/e9ecef/495057?text=About+Us" class="img-fluid rounded shadow" alt="About Illustration">
        </div>
    </div>
@endsection