{{-- File: resources/views/include/header.blade.php --}}
{{-- Komponen navigasi utama website --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container-fluid">
    
    {{-- Brand/Logo: route('home') generate URL /home secara dinamis --}}
    <a class="navbar-brand fw-bold" href="{{ route('home') }}">ISB Commerce</a>
    
    {{-- Toggle button untuk tampilan mobile (Bootstrap 5) --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    {{-- Menu navigasi --}}
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">Products</a>
        </li>
        
        {{-- Menu Home: class 'active' muncul otomatis jika route saat ini bernama 'home' --}}
        {{-- request()->routeIs('home') return boolean true/false --}}
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" 
             href="{{ route('home') }}">Home</a>
        </li>
        
        {{-- Menu Shop Here --}}
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('store') ? 'active' : '' }}" 
             href="{{ route('store') }}">Shop Here</a>
        </li>
        
        {{-- Menu About Us --}}
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" 
             href="{{ route('about') }}">About Us</a>
        </li>
        
      </ul>
      
      {{-- Icon keranjang belanja (static sementara) --}}
      <a href="#" class="btn btn-outline-primary position-relative">
        <i class="fas fa-shopping-cart"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          0 {{-- Nanti diganti dengan dynamic cart count --}}
        </span>
      </a>
      
    </div>
  </div>
</nav>