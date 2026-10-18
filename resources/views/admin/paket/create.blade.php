@extends('admin')

@section('title', 'Tambah Paket Catering Baru')
@section('page_title', 'Tambah Paket')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <a href="{{ route('admin.paket.index') }}" class="btn btn-link text-decoration-none text-muted p-0 mb-2 d-inline-flex align-items-center gap-1">
            <i class="ti ti-arrow-left"></i> Kembali ke Daftar Paket
        </a>
        <h3 class="fw-bold mb-1 text-dark">Tambah Paket Catering Baru</h3>
        <p class="text-muted small">Lengkapi formulir master paket untuk menambahkan bundel menu prasmanan, nasi box, atau event.</p>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 fw-bold text-dark">Informasi Paket</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.paket.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama Paket -->
                    <div class="mb-3">
                        <label for="nama_paket" class="form-label fw-semibold">Nama Paket Catering <span class="text-danger">*</span></label>
                        <input type="text" name="nama_paket" id="nama_paket" 
                               class="form-control @error('nama_paket') is-invalid @enderror" 
                               value="{{ old('nama_paket') }}" 
                               placeholder="Contoh: Paket Prasmanan Royal Nusantara" required>
                        @error('nama_paket')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3 mb-3">
                        <!-- Jenis Paket -->
                        <div class="col-12 col-md-6">
                            <label for="jenis_paket" class="form-label fw-semibold">Jenis Paket <span class="text-danger">*</span></label>
                            <select name="jenis_paket" id="jenis_paket" class="form-select @error('jenis_paket') is-invalid @enderror" required>
                                <option value="" disabled selected>-- Pilih Jenis Paket --</option>
                                @foreach($jenisOptions as $opt)
                                    <option value="{{ $opt }}" {{ old('jenis_paket') == $opt ? 'selected' : '' }}>
                                        {{ $opt }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_paket')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="col-12 col-md-6">
                            <label for="status" class="form-label fw-semibold">Status Ketersediaan <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="Tersedia" {{ old('status', 'Tersedia') == 'Tersedia' ? 'selected' : '' }}>Tersedia (Ready to Order)</option>
                                <option value="Penuh / Pre-Order" {{ old('status') == 'Penuh / Pre-Order' ? 'selected' : '' }}>Penuh / Pre-Order</option>
                                <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <!-- Harga Paket -->
                        <div class="col-12 col-md-6">
                            <label for="harga_paket" class="form-label fw-semibold">Harga Paket / Porsi (Rp) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted fw-bold">Rp</span>
                                <input type="number" name="harga_paket" id="harga_paket" 
                                       class="form-control @error('harga_paket') is-invalid @enderror" 
                                       value="{{ old('harga_paket') }}" placeholder="55000" min="0" step="500" required>
                                @error('harga_paket')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="text-muted">Nominal angka saja (contoh: 55000).</small>
                        </div>

                        <!-- Minimal Pemesanan -->
                        <div class="col-12 col-md-6">
                            <label for="minimal_porsi" class="form-label fw-semibold">Minimal Order (Porsi/Box) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" name="minimal_porsi" id="minimal_porsi" 
                                       class="form-control @error('minimal_porsi') is-invalid @enderror" 
                                       value="{{ old('minimal_porsi', 20) }}" min="1" required>
                                <span class="input-group-text bg-light text-muted">Porsi</span>
                                @error('minimal_porsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="text-muted">Jumlah minimum pesanan agar paket berlaku.</small>
                        </div>
                    </div>

                    <!-- Rincian Menu Paket (Deskripsi) -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-semibold">Rincian Komposisi Menu</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" 
                                  class="form-control @error('deskripsi') is-invalid @enderror" 
                                  placeholder="Tuliskan daftar lauk, sayuran, sop, sambal, hidangan penutup yang termasuk dalam paket ini...">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Fasilitas & Perlengkapan -->
                    <div class="mb-4">
                        <label for="fasilitas" class="form-label fw-semibold">Fasilitas & Layanan Tambahan</label>
                        <textarea name="fasilitas" id="fasilitas" rows="3" 
                                  class="form-control @error('fasilitas') is-invalid @enderror" 
                                  placeholder="Contoh: Termasuk meja dekorasi, pemanas roll top, piring & sendok, pramusaji standby, gratis ongkir...">{{ old('fasilitas') }}</textarea>
                        @error('fasilitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Upload Foto Paket -->
                    <div class="mb-4">
                        <label for="foto" class="form-label fw-semibold">Foto Dokumentasi Paket</label>
                        <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*" onchange="previewImage(event)">
                        <div class="form-text">Format: JPG, PNG, WEBP. Maksimal 2MB. (Opsional)</div>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <!-- Preview Container -->
                        <div class="mt-3 d-none" id="previewContainer">
                            <label class="form-label text-muted small d-block">Preview Foto Paket:</label>
                            <img id="imagePreview" src="#" alt="Preview Foto" class="rounded-3 border shadow-sm" style="max-height: 180px; width: auto; object-fit: cover;">
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold">
                            <i class="ti ti-device-floppy me-1"></i> Simpan Paket
                        </button>
                        <a href="{{ route('admin.paket.index') }}" class="btn btn-light border px-4 py-2">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Petunjuk Pengisian -->
    <div class="col-12 col-lg-4 mt-3 mt-lg-0">
        <div class="card border-0 shadow-sm bg-light">
            <div class="card-body p-4">
                <h6 class="fw-bold text-dark mb-3">
                    <i class="ti ti-info-circle text-primary me-1"></i> Ketentuan Paket Master
                </h6>
                <ul class="text-muted small ps-3 mb-0" style="line-height: 1.8;">
                    <li>Paket catering merupakan <strong>tabel master ke-3</strong> mandiri (tanpa relasi foreign key).</li>
                    <li>Sertakan <strong>fasilitas gratis</strong> (seperti pemanas roll top atau pelayan) agar calon pemesan lebih tertarik.</li>
                    <li>Gunakan <strong>minimal porsi</strong> yang realistis sesuai kapasitas dapur catering.</li>
                    <li>Status paket dapat diubah sewaktu-waktu jika jadwal dapur sedang penuh (Pre-Order).</li>
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
