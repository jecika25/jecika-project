@extends('admin')

@section('title', 'Tambah Menu Catering Baru')
@section('page_title', 'Tambah Menu')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <a href="{{ route('admin.menu.index') }}" class="btn btn-link text-decoration-none text-muted p-0 mb-2 d-inline-flex align-items-center gap-1">
            <i class="ti ti-arrow-left"></i> Kembali ke Daftar Menu
        </a>
        <h3 class="fw-bold mb-1 text-dark">Tambah Sajian Menu Baru</h3>
        <p class="text-muted small">Lengkapi formulir berikut untuk menambahkan sajian atau paket catering baru.</p>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 fw-bold text-dark">Informasi Menu</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama Menu -->
                    <div class="mb-3">
                        <label for="nama_menu" class="form-label fw-semibold">Nama Menu / Paket <span class="text-danger">*</span></label>
                        <input type="text" name="nama_menu" id="nama_menu" class="form-control @error('nama_menu') is-invalid @enderror" 
                               value="{{ old('nama_menu') }}" placeholder="Contoh: Paket Nasi Box Ayam Bakar Madu" required>
                        @error('nama_menu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3 mb-3">
                        <!-- Kategori -->
                        <div class="col-12 col-md-6">
                            <label for="kategori" class="form-label fw-semibold">Kategori Menu <span class="text-danger">*</span></label>
                            <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ old('kategori') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="col-12 col-md-6">
                            <label for="status" class="form-label fw-semibold">Ketersediaan Menu <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="Tersedia" {{ old('status', 'Tersedia') == 'Tersedia' ? 'selected' : '' }}>Tersedia (Ready to Order)</option>
                                <option value="Habis" {{ old('status') == 'Habis' ? 'selected' : '' }}>Habis (Stok Kosong)</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <!-- Harga -->
                        <div class="col-12 col-md-6">
                            <label for="harga" class="form-label fw-semibold">Harga per Porsi (Rp) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted fw-bold">Rp</span>
                                <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" 
                                       value="{{ old('harga') }}" placeholder="35000" min="0" step="500" required>
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="text-muted">Masukkan nominal angka saja tanpa titik.</small>
                        </div>

                        <!-- Minimal Porsi -->
                        <div class="col-12 col-md-6">
                            <label for="minimal_porsi" class="form-label fw-semibold">Minimal Pemesanan (Porsi) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" name="minimal_porsi" id="minimal_porsi" class="form-control @error('minimal_porsi') is-invalid @enderror" 
                                       value="{{ old('minimal_porsi', 1) }}" min="1" required>
                                <span class="input-group-text bg-light text-muted">Porsi / Box</span>
                                @error('minimal_porsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="text-muted">Batas minimum order pemesan.</small>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi Sajian & Menu Lengkap</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" 
                                  placeholder="Tuliskan komposisi menu, lauk pauk, sambal, sayuran, atau detail hidangan...">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Upload Foto -->
                    <div class="mb-4">
                        <label for="foto" class="form-label fw-semibold">Foto Hidangan / Menu</label>
                        <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*" onchange="previewImage(event)">
                        <div class="form-text">Format yang didukung: JPG, PNG, WEBP. Maksimal 2MB. (Opsional)</div>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <!-- Preview Container -->
                        <div class="mt-3 d-none" id="previewContainer">
                            <label class="form-label text-muted small d-block">Preview Foto:</label>
                            <img id="imagePreview" src="#" alt="Preview Foto" class="rounded-3 border shadow-sm" style="max-height: 180px; width: auto; object-fit: cover;">
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold">
                            <i class="ti ti-device-floppy me-1"></i> Simpan Menu
                        </button>
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-light border px-4 py-2">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Quick Tips Card -->
    <div class="col-12 col-lg-4 mt-3 mt-lg-0">
        <div class="card border-0 shadow-sm bg-light">
            <div class="card-body p-4">
                <h6 class="fw-bold text-dark mb-3">
                    <i class="ti ti-bulb text-warning me-1"></i> Tips Pengisian Menu
                </h6>
                <ul class="text-muted small ps-3 mb-0" style="line-height: 1.8;">
                    <li>Gunakan <strong>Nama Menu</strong> yang menarik dan jelas (misal: "Nasi Liwet Solo Komplit").</li>
                    <li>Sertakan <strong>kategori</strong> yang tepat agar tamu mudah memfilter pada halaman katalog website.</li>
                    <li>Rincikan <strong>lauk dan pelengkap</strong> pada kolom deskripsi untuk meyakinkan calon pelanggan.</li>
                    <li>Gunakan foto makanan dengan pencahayaan terang agar hidangan tampak lezat.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function previewImage(event) {
        const input = event.target;
        const previewContainer = document.getElementById('previewContainer');
        const imagePreview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                previewContainer.classList.remove('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            imagePreview.src = "#";
            previewContainer.classList.add('d-none');
        }
    }
</script>
@endsection
