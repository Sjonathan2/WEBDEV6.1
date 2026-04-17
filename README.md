```markdown
# 🎓 Web Design and Development - Week 6.1

> **Kode Mata Kuliah**: ISB02303403  
> **Semester**: Even Semester 2025/2026  
> **SKS**: 6  
> **Topik**: MVC Concept and Laravel Installation  

---------------------------

## 📅 Informasi Week

| Item | Keterangan |
|------|-----------|
| **Week** | 6.1 |
| **Topik Utama** | MVC Concept & Laravel Installation |
| **Project Lanjutan** | ❌ Tidak ada (materi fundamental baru) |
| **Prasyarat** | GitHub Account, Git, Laravel Herd |

---------------------------

## 🧠 Konsep MVC (Model-View-Controller)

### Apa itu MVC?
MVC adalah pola arsitektur yang memisahkan aplikasi menjadi 3 komponen logis utama:

```
USER → [Controller] → [Model] ↔ [Database]
              ↓
         [View] → USER
```

### 📊 Analogi Restoran

| Komponen | Analogi | Fungsi dalam Aplikasi |
|----------|---------|---------------------|
| **Model** | Dapur + Gudang | Mengelola data: CRUD, interaksi database |
| **View** | Piring + Penyajian | Menampilkan UI dalam format HTML/CSS |
| **Controller** | Pelayan + Kasir | Menerima input, memproses logika, memilih View |

### 🔍 Detail Komponen dengan Kode

#### 🗄️ MODEL
```php
<?php
// File: app/Models/Book.php
// Model mengelola DATA saja, TIDAK pernah menangani tampilan UI!

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model {
    
    // ✅ Mengelola data: judul, penulis, harga, stok
    // ✅ Menegakkan aturan bisnis (business rules)
    // ✅ Berinteraksi langsung dengan database
    
    // ❌ TIDAK pernah: menampilkan HTML, menangani request user
    
    // Contoh method: mengambil semua buku dari database
    public static function getAllBooks() {
        // Query ke database menggunakan Laravel Query Builder
        // Returns: Collection of books
        return DB::table('books')->get(); 
    }
    
    // Contoh method: mencari buku berdasarkan ID
    public static function findBookById($id) {
        // where('id', $id) -> filter kolom id
        // first() -> ambil hanya 1 record pertama yang cocok
        return DB::table('books')->where('id', $id)->first();
    }
}
```

#### 👁️ VIEW
```blade
{{-- File: resources/views/books.blade.php --}}
{{-- View hanya menangani PRESENTASI data ke user --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
</head>
<body>
    <h1>Daftar Buku</h1>
    
    {{-- Looping data yang dikirim dari Controller --}}
    {{-- $books adalah variabel yang di-pass dari Controller --}}
    @foreach($books as $book)
        <div class="book-card">
            {{-- Output data dengan Blade syntax {{ }} --}}
            {{-- Blade otomatis sanitize output untuk mencegah XSS --}}
            <h3>{{ $book->title }}</h3>
            <p>Penulis: {{ $book->author }}</p>
            <p>Harga: Rp {{ number_format($book->price, 0, ',', '.') }}</p>
            <p>Stok: {{ $book->stock }} unit</p>
        </div>
    @endforeach
</body>
</html>
```

#### 🎮 CONTROLLER
```php
<?php
// File: app/Http/Controllers/BookController.php
// Controller menangani REQUEST FLOW: menerima input → proses → kirim ke View

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Import Model

class BookController extends Controller {
    
    // Method untuk menampilkan halaman daftar buku
    public function index() {
        // 1. Ambil data dari Model (Business Logic)
        $books = Book::getAllBooks();
        
        // 2. Kirim data ke View (Presentation Layer)
        //    view() helper: render file .blade.php
        //    Array ['books' => $books]: data yang di-pass ke View
        return view('books', ['books' => $books]);
    }
    
    // Method untuk menampilkan detail buku dengan parameter
    public function show($id) {
        // Ambil data buku berdasarkan ID dari Model
        $book = Book::findBookById($id);
        
        // Jika buku tidak ditemukan, return 404 Not Found
        if (!$book) {
            abort(404);
        }
        
        // Kirim data ke view detail
        return view('book-detail', ['book' => $book]);
    }
}
```

### ✅ Keuntungan Menggunakan MVC
1. **Separation of Concerns**: Logika bisnis, UI, dan input terpisah → mudah maintenance
2. **Reusability**: Model bisa dipakai di banyak View berbeda
3. **Testability**: Mudah dilakukan unit testing per komponen
4. **Team Collaboration**: Backend dev fokus Model, Frontend dev fokus View

---------------------------

## 🚀 Instalasi Laravel

### Opsi 1: Laravel Herd (⭐ Rekomendasi untuk Pemula)

#### Prasyarat
- ✅ GitHub Account: https://github.com
- ✅ Git: https://git-scm.com/install/
- ✅ Laravel Herd: https://herd.laravel.com/

#### Langkah Instalasi
```bash
# 1. Download & install Laravel Herd sesuai OS Anda
#    Windows: https://herd.laravel.com/windows
#    macOS: https://herd.laravel.com/mac

# 2. Buka Herd Dashboard → Pastikan semua services Active
#    - PHP: ✅ Active
#    - Nginx: ✅ Active
#    - Node: ✅ Active (opsional)
#    ⚠️ Catatan: Di versi gratis, MySQL tidak bisa start dari Herd

# 3. Buat project baru via Herd Dashboard:
#    - Klik "Open Sites" → "New Laravel Project"
#    - Pilih "No Starter Kit" (untuk pemula, mulai dari nol)
#    - Project Name: webdev6.1
#    - Target Location: D:\Herd\ (sesuaikan)

# 4. Tunggu instalasi selesai (2-5 menit)

# 5. Akses project di browser:
#    🔗 http://webdev6.1.test
#    💡 Herd otomatis mapping pretty URL tanpa config hosts manual!
```

### Opsi 2: Composer + XAMPP (Alternatif)

#### Prasyarat
```bash
# PHP ≥ 8.3
# Web Server: Apache/Nginx via XAMPP (https://www.apachefriends.org/)
# Database: MySQL/PostgreSQL/SQLite
# Composer: https://getcomposer.org/
```

#### Langkah Instalasi
```bash
# 1. Pastikan PHP XAMPP terdaftar di PATH
#    Saat install Composer, pilih: C:\xampp\php\php.exe

# 2. Buka terminal, masuk ke folder htdocs XAMPP
cd C:\xampp\htdocs

# 3. Buat project Laravel baru
composer create-project laravel/laravel webdev6.1

# 4. Masuk ke folder project
cd webdev6.1

# 5. Jalankan development server
php artisan serve
# Output: Server running on [http://127.0.0.1:8000]

# 6. Akses di browser: http://localhost:8000
```

---------------------------

## 📁 Struktur Folder Laravel

```
webdev6.1/
├── app/                    # 🧠 CORE LOGIC - hampir semua class ada di sini
│   ├── Http/
│   │   ├── Controllers/   # 🎮 Controller: handle request user
│   │   └── Middleware/    # 🔐 Filter request sebelum ke Controller
│   ├── Models/            # 🗄️ Model: representasi tabel database
│   └── Providers/         # ⚙️ Service providers untuk bootstrap
│
├── bootstrap/             # 🚀 File bootstrap framework (app.php)
│
├── config/                # ⚙️ File konfigurasi: database, app, cache, dll
│   ├── app.php           # Config aplikasi: name, env, url, timezone
│   ├── database.php      # Config koneksi database
│   └── ...
│
├── database/              # 🗃️ Migration, seeder, factory
│   ├── migrations/       # Script version control database (timestamp_name.php)
│   ├── seeders/          # Data dummy untuk testing (DatabaseSeeder.php)
│   └── factories/        # Factory untuk generate data testing
│
├── public/                # 🌐 Folder publik - entry point aplikasi
│   ├── index.php         # File pertama yang dijalankan saat akses web
│   ├── .htaccess         # Config Apache URL rewriting
│   └── storage/          # Symbolic link ke storage/app/public
│
├── resources/             # 🎨 Assets & View mentah (belum di-compile)
│   ├── views/            # 👁️ File Blade template (.blade.php)
│   │   ├── welcome.blade.php  # Default welcome page
│   │   └── ...
│   ├── css/              # File CSS/SCSS mentah
│   └── js/               # File JS mentah
│
├── routes/                # 🗺️ Definisi URL/route aplikasi
│   ├── web.php           # Route untuk web browser (dengan session, CSRF)
│   ├── api.php           # Route untuk API (stateless, token auth)
│   ├── console.php       # Closure-based console commands
│   └── channels.php      # Broadcast channel definitions
│
├── storage/               # 📦 File generated: logs, cache, session, compiled views
│   ├── app/              # User uploaded files
│   ├── framework/        # Cache, sessions, compiled Blade views
│   └── logs/             # Laravel log file (laravel.log)
│
├── tests/                 # 🧪 File automated testing (PHPUnit/Pest)
│
├── vendor/                # 📦 Composer dependencies (JANGAN DI-EDIT!)
│
├── .env                   # 🔐 Environment variables: DB config, APP_KEY, etc.
├── .env.example           # Template .env untuk referensi
├── .gitignore             # 🚫 File/folder yang diabaikan Git (vendor, .env, dll)
│
├── artisan                # 🛠️ Command-line tool Laravel (php artisan ...)
├── composer.json          # 📋 Daftar package/dependency project
├── composer.lock          # 🔒 Lock file untuk pastikan versi dependency sama
├── package.json           # 📦 NPM dependencies untuk frontend assets
└── vite.config.js         # ⚡ Config Vite untuk compile CSS/JS
```

---------------------------

## 🎯 "Hello World" Laravel - Langkah Demi Langkah

### Step 1: Edit Route (`routes/web.php`)
```php
<?php
// File: routes/web.php
// Route mendefinisikan URL pattern dan handler-nya

use Illuminate\Support\Facades\Route;

// ✅ Route dasar: ketika user akses URL '/', tampilkan view 'welcome'
Route::get('/', function () {
    // view() helper: render file resources/views/welcome.blade.php
    return view('welcome');
});

// ✅ Route custom dengan named route (untuk referensi mudah di kode)
Route::get('/home', function () {
    return view('home'); // Render resources/views/home.blade.php
})->name('home'); // Named route: bisa dipanggil dengan route('home')

// ✅ Route dengan parameter (contoh: /user/123)
Route::get('/user/{id}', function ($id) {
    // $id otomatis diambil dari URL segment
    return "User ID: " . $id;
});

// ✅ Route dengan parameter optional (tanda ?)
Route::get('/post/{id?}', function ($id = null) {
    // Jika /post → $id = null
    // Jika /post/456 → $id = "456"
    return $id ? "Post ID: $id" : "All Posts";
});
```

### Step 2: Buat View Custom (`resources/views/home.blade.php`)
```blade
{{-- File: resources/views/home.blade.php --}}
{{-- Blade template engine: PHP + shortcut syntax untuk Laravel --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- Dynamic title dengan Blade --}}
    <title>{{ config('app.name', 'Laravel') }} - Home</title>
    
    {{-- Load CSS dengan helper asset() --}}
    {{-- asset() generate URL ke folder public/ --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    {{-- Header Section --}}
    <header>
        <h1>My Home Page</h1>
        <p>Selamat datang di Laravel! 🚀</p>
    </header>
    
    {{-- Main Content --}}
    <main>
        {{-- Contoh output variabel dari Controller --}}
        {{-- Jika Controller kirim: ['username' => 'Budi'] --}}
        <p>Halo, {{ $username ?? 'Guest' }}!</p>
        
        {{-- Conditional rendering dengan Blade --}}
        @if(isset($messages) && count($messages) > 0)
            <div class="alerts">
                @foreach($messages as $msg)
                    <p class="alert alert-info">{{ $msg }}</p>
                @endforeach
            </div>
        @endif
    </main>
    
    {{-- Footer Section --}}
    <footer>
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </footer>
    
    {{-- Load JS di akhir body untuk performa --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
```

### Step 3: Debugging dengan `dd()` - Dump & Die
```php
<?php
// File: routes/web.php

Route::get('/debug', function () {
    // Data contoh untuk debugging
    $user = [
        'id' => 1,
        'name' => 'Budi Santoso',
        'email' => 'budi@example.com',
        'roles' => ['admin', 'editor']
    ];
    
    // ✅ dd() = "Dump and Die"
    //    - Menampilkan isi variabel dalam format rapi (dengan syntax highlighting)
    //    - STOP eksekusi script setelahnya (kode di bawah tidak jalan)
    //    - Sangat berguna untuk cek alur data & debugging
    dd($user);
    
    // ❌ Kode di bawah ini TIDAK akan dijalankan karena dd() menghentikan eksekusi
    return view('home');
});

// ✅ Alternatif: dump() tanpa die (kode tetap jalan)
Route::get('/debug2', function () {
    $data = ['test' => 'value'];
    
    dump($data); // Tampilkan isi $data, tapi lanjut eksekusi
    
    return view('home'); // Ini akan tetap dirender
});

// ✅ Tips: Gunakan dd() saat:
//    1. Ingin cek isi variabel/request
//    2. Debug alur eksekusi (apakah kode sampai ke titik ini?)
//    3. Validasi data sebelum diproses lebih lanjut
// 
// ❌ Jangan lupa: Hapus/komentari dd() setelah debugging selesai!
//    Karena dd() akan break aplikasi di production
```

---------------------------

## 📦 Git & GitHub Workflow

### Membuat Repository Baru di GitHub
```bash
# 1. Login ke GitHub: https://github.com
# 2. Klik "+" (pojok kanan atas) → "New repository"
# 3. Isi:
#    - Repository name: webdev-laravel
#    - Description: Project Web Design & Development - Week 6.1
#    - Visibility: ✅ Public
#    - ❌ JANGAN centang: "Add a README file"
#    - ❌ JANGAN centang: "Add .gitignore" (Laravel sudah sediakan!)
#    - ❌ JANGAN centang: "Choose a license"
# 4. Klik "Create repository"
# 5. Copy URL repository: https://github.com/USERNAME/webdev-laravel.git
```

### Inisialisasi Git Lokal & Push Pertama
```bash
# 🔹 Pastikan Anda di folder project Laravel
cd ~/Herd/webdev6.1  # Sesuaikan path project Anda

# 🔹 Reset Git jika pernah init sebelumnya (opsional, untuk mulai bersih)
rm -rf .git          # Hapus folder .git lama (history Git sebelumnya)

# 🔹 Inisialisasi repository Git baru dari nol
git init
# Output: Initialized empty Git repository in .../.git/

# 🔹 Tambahkan SEMUA file project ke staging area
#    Titik (.) = semua file & folder di direktori saat ini
#    Laravel otomatis LEWATKAN file yang ada di .gitignore:
#    - /vendor/ (dependencies Composer, >200MB)
#    - /.env (file rahasia: DB password, API key)
#    - /node_modules/ (dependencies NPM)
#    - /storage/logs/ (log file yang terus bertambah)
git add .

# 🔹 Simpan snapshot pertama dengan pesan deskriptif
#    Format commit message: <type>: <deskripsi singkat>
#    - feat: fitur baru
#    - fix: perbaikan bug
#    - docs: update dokumentasi
#    - style: format kode (tanpa ubah logika)
#    - refactor: ubah struktur tanpa ubah fungsi
git commit -m "feat: initial laravel project setup week 6.1"
# Output: [main (root-commit) abc1234] feat: initial laravel project setup week 6.1

# 🔹 Rename branch default menjadi 'main' (standar GitHub saat ini)
git branch -M main

# 🔹 Hubungkan ke GitHub repository remote
#    Ganti URL dengan repository Anda!
git remote add origin https://github.com/USERNAME/webdev-laravel.git

# 🔹 Verifikasi remote connection
git remote -v
# Output harus:
# origin  https://github.com/USERNAME/webdev-laravel.git (fetch)
# origin  https://github.com/USERNAME/webdev-laravel.git (push)

# 🔹 Push pertama kali dengan flag '-u' (UPSTREAM TRACKING) ⭐ PENTING
#    Flag -u = "set upstream" → mengaitkan branch lokal 'main' 
#    dengan branch remote 'origin/main'
#    INI KUNCI agar selanjutnya cukup ketik 'git push' saja!
git push -u origin main

# 🔐 Jika diminta login/password:
#    - Username: GitHub username Anda
#    - Password: Personal Access Token (bukan password akun!)
#      Buat token: GitHub → Settings → Developer settings → Personal access tokens
#      → Generate new token (classic) → centang ✅ repo → copy → paste saat diminta
```

### ✅ Verifikasi Push Berhasil
```bash
# 1. Cek status Git (harus clean)
git status
# Output: On branch main
#         nothing to commit, working tree clean

# 2. Lihat history commit terakhir
git log --oneline -3
# Output:
# abc1234 feat: initial laravel project setup week 6.1

# 3. Buka browser: https://github.com/USERNAME/webdev-laravel
#    Pastikan file Laravel muncul: app/, routes/, resources/, .env.example, dll
```

### 🔄 Workflow Harian (Setelah Push Pertama)
```bash
# Setiap kali Anda mengubah kode, ikuti 3 langkah ini:

# 1. Stage perubahan (otomatis abaikan file di .gitignore)
git add .

# 2. Commit dengan pesan deskriptif
git commit -m "feat: tambah halaman store dengan product list"
# atau
git commit -m "fix: perbaiki error validasi form produk"

# 3. Push ke GitHub (langsung jalan karena sudah di-set upstream dengan -u)
git push
# ⭐ Tidak perlu ketik '-u origin main' lagi! Git sudah ingat tracking-nya
```

### 💡 Tips Pro: Alias Git untuk Workflow Cepat
```bash
# Tambahkan alias di Git config global (cukup sekali seumur install Git)
git config --global alias.gp '!git add . && git commit -m "auto update" && git push'

# Sekarang, 3 langkah jadi 1 ketikan:
git gp
# Otomatis: add → commit → push! 🚀

# Alias lainnya yang berguna:
git config --global alias.st 'status'      # git st = git status
git config --global alias.co 'checkout'    # git co = git checkout
git config --global alias.br 'branch'      # git br = git branch
git config --global alias.lg 'log --oneline --graph'  # git lg = log visual
```

### 🔍 Troubleshooting Git Umum
```bash
# ❌ Error: "remote origin already exists"
# ✅ Solusi: Hapus remote lama, tambah ulang
git remote remove origin
git remote add origin https://github.com/USERNAME/repo.git

# ❌ Error: "Updates were rejected because remote has work you don't have"
# ✅ Solusi: Pull dulu dengan flag khusus, lalu push
git pull origin main --allow-unrelated-histories
git push

# ❌ Error: "Permission denied" atau "Authentication failed"
# ✅ Solusi: Gunakan Personal Access Token sebagai password
#    Atau setup credential helper:
git config --global credential.helper store

# ❌ Ingin lihat perbedaan lokal vs remote sebelum push?
git fetch origin                    # Ambil info dari remote tanpa merge
git diff main origin/main          # Lihat perbedaan kode

# ❌ Ingin batalkan perubahan file yang belum di-commit?
git restore nama_file.php          # Restore 1 file
git restore .                      # Restore semua file yang diubah
git clean -fd                      # Hapus file untracked (hati-hati!)
```

---------------------------

## ✅ Checklist Pemahaman Week 6.1

- [ ] ✅ Install Laravel Herd dan akses `http://webdev6.1.test`
- [ ] ✅ Paham perbedaan Model, View, Controller (bisa jelaskan dengan analogi)
- [ ] ✅ Bisa membuat route baru dan return view custom
- [ ] ✅ Paham fungsi `dd()` untuk debugging dan kapan harus dihapus
- [ ] ✅ Project di-push ke GitHub dengan README dokumentasi
- [ ] ✅ Workflow Git harian: `git add` → `git commit` → `git push`

---------------------------

## 🔗 Link Penting & Referensi

| Resource | URL | Keterangan |
|----------|-----|-----------|
| Laravel Docs | https://laravel.com/docs | Dokumentasi resmi Laravel 12 |
| Git Learning | https://learngitbranching.js.org/ | Tutorial Git interaktif & visual |
| Laravel Herd | https://herd.laravel.com/ | One-click PHP dev environment |
| GitHub | https://github.com | Cloud repository untuk version control |
| Blade Docs | https://laravel.com/docs/blade | Panduan lengkap Blade templating |
| MVC Pattern | https://en.wikipedia.org/wiki/Model–view–controller | Penjelasan teori MVC |

---------------------------

## 🔄 Next: Week 6.2

> **Topik**: Route, View, Blade, Controller  
> **Target**: 
> - Membuat halaman dinamis dengan parameter
> - Passing data dari Controller ke View
> - Blade template inheritance & layouting
> - Page routing dengan named routes

```blade
{{-- Preview Week 6.2: Passing data dari Controller --}}
{{-- Controller --}}
return view('store', [
    'products' => Product::all(),
    'categories' => Category::all()
]);

{{-- View (store.blade.php) --}}
@foreach($products as $product)
    <h3>{{ $product->name }}</h3>
    <p>Kategori: {{ $product->category->name }}</p>
@endforeach
```

---------------------------

## 📝 Catatan Pribadi

> 💡 **Tips Belajar**:
> 1. Jangan copy-paste buta — ketik ulang kode untuk muscle memory
> 2. Gunakan `dd()` untuk eksplorasi: cek isi variabel, alur eksekusi
> 3. Commit kecil-kecil dengan pesan jelas → mudah revert jika error
> 4. Baca error message Laravel — biasanya sangat deskriptif!
> 
> ❓ **Masih Bingung?**
> - MVC masih abstrak? → Fokus ke analogi restoran dulu
> - Git error? → Copy-paste error ke dosen, jangan panic
> - Route tidak jalan? → Cek: 1) File web.php, 2) Named route, 3) Browser cache
> 
> 🎯 **Goal Week 6.1**: Paham "mengapa" sebelum "bagaimana". 
>    MVC bukan sekadar folder, tapi pola pikir memisahkan concern.

---

*Documentation generated for ISB02303403 - Web Design and Development*  
*Week 6.1 | Even Semester 2025/2026 | UC eLearn*
```
