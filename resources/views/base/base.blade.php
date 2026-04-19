{{-- File: resources/views/base/base.blade.php --}}
{{-- MASTER LAYOUT: Kerangka HTML utama yang akan di-extends oleh halaman lain --}}
<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Meta charset: encoding karakter UTF-8 --}}
    <meta charset="UTF-8">
    
    {{-- Viewport: responsif di mobile device --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Bootstrap 5 CSS CDN: framework styling --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
    
    {{-- Font Awesome CDN: ikon (shopping cart, dll) --}}
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
          integrity="sha512-Evv84Mr4..." 
          crossorigin="anonymous">
    
    {{-- Title dinamis: default 'ISB Commerce' jika child tidak override --}}
    <title>@yield('title', 'ISB Commerce')</title>
    
    {{-- Slot untuk custom CSS di halaman anak --}}
    @yield('styles')
</head>
<body>

    {{-- @include: menyisipkan file header.blade.php langsung di sini --}}
    @include('include.header')

    {{-- Area konten utama: @yield('content') akan diisi oleh @section('content') dari child view --}}
    <main class="container-fluid px-4 px-md-5 py-5" style="margin: 0 auto; max-width: 1400px;">
        @yield('content')
    </main>

    {{-- @include: menyisipkan file footer.blade.php langsung di sini --}}
    @include('include.footer')

    {{-- Bootstrap 5 JS Bundle CDN: interaksi dropdown, modal, dll --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous"></script>
    
    {{-- Slot untuk custom JavaScript di halaman anak --}}
    @yield('scripts')
    
</body>
</html>