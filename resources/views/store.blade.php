{{-- File: resources/views/store.blade.php --}}
{{-- @extends: mewarisi struktur HTML lengkap dari base.blade.php --}}
@extends('base.base')

{{-- @section('title'): mengoverride title default di <head> base layout --}}
@section('title', 'Store - ISB Commerce')

{{-- @section('content'): mengisi slot @yield('content') di base layout --}}
@section('content')
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Halaman Store</h1>
        <p class="lead text-muted">Daftar produk akan ditampilkan di sini.</p>
    </div>

    {{-- Placeholder konten statis (nanti diganti data dinamis dari Database di Week 7) --}}
    <div class="alert alert-info text-center" role="alert">
        Konten dinamis Store akan diimplementasikan di materi Week 7 (Database & Eloquent ORM).
    </div>
@endsection