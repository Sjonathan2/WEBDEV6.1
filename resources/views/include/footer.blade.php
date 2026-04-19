{{-- File: resources/views/include/footer.blade.php --}}
{{-- Komponen footer website --}}
<footer class="bg-light border-top py-4 mt-5">
  <div class="container text-center">
    
    {{-- Copyright tahun otomatis update setiap tahun baru --}}
    <p class="mb-1 text-muted small">
      &copy; {{ date('Y') }} ISB Commerce. All rights reserved.
    </p>
    
    {{-- Link kebijakan privasi & bantuan --}}
    <div class="small">
      <a href="#" class="text-decoration-none text-muted me-3">Terms</a>
      <a href="#" class="text-decoration-none text-muted me-3">Privacy</a>
      <a href="#" class="text-decoration-none text-muted">Help</a>
    </div>
    
  </div>
</footer>