{{-- File: resources/views/home.blade.php --}}
{{-- Blade comment: tidak akan tampil di browser, hanya untuk developer --}}

<!DOCTYPE html>
<!-- Attribute lang untuk aksesibilitas & SEO -->
<html lang="en">
<head>
    {{-- Meta charset: encoding karakter UTF-8 (dukung emoji, simbol) --}}
    <meta charset="UTF-8">
    
    {{-- Viewport: agar halaman responsif di mobile --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- X-UA-Compatible: mode rendering terbaik di IE/Edge --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- Title halaman: tampil di tab browser --}}
    <title>Home Page</title>
</head>
<body>
    {{-- Heading utama halaman --}}
    <h1>My Home Page</h1>
    
    {{-- Paragraf sambutan --}}
    <p>Selamat datang di halaman Home Laravel! 🚀</p>
    
    {{-- Contoh output variabel Blade (akan kita pakai nanti) --}}
    {{-- {{ $variable }} = output dengan auto-escape (aman dari XSS) --}}
    {{-- {!! $variable !!} = output tanpa escape (hati-hati, bisa XSS!) --}}
</body>
</html>