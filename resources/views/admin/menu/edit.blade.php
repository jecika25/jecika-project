@extends('admin')

@section('title', 'Edit Menu: ' . $menu->nama_menu)
@section('page_title', 'Edit Menu Catering')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <a href="{{ route('admin.menu.index') }}" class="btn btn-link text-decoration-none text-muted p-0 mb-2 d-inline-flex align-items-center gap-1">
            <i class="ti ti-arrow-left"></i> Kembali ke Daftar Menu
        </a>
        <h3 class="fw-bold mb-1 text-dark">Edit Sajian Menu</h3>
        <p class="text-muted small">Perbarui rincian, harga, atau foto menu #{{ $menu->id }} ({{ $menu->nama_menu }}).</p>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 fw-bold text-dark">Perbarui Data Menu</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nama Menu -->
                    <div class="mb-3">
                        <label for="nama_menu" class="form-label fw-semibold">Nama Menu / Paket <span class="text-danger">*</span></label>
                        <input type="text" name="nama_menu" id="nama_menu" class="form-control @error('nama_menu') is-invalid @enderror" 
                               value="{{ old('nama_menu', $menu->nama_menu) }}" required>
                        @error('nama_menu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3 mb-3">
                        <!-- Kategori -->
                        <div class="col-12 col-md-6">
                            <label for="kategori" class="form-label fw-semibold">Kategori Menu <span class="text-danger">*</span></label>
                            <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ old('kategori', $menu->kategori) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
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
                                <option value="Tersedia" {{ old('status', $menu->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia (Ready to Order)</option>
                                <option value="Habis" {{ old('status', $menu->status) == 'Habis' ? 'selected' : '' }}>Habis (Stok Kosong)</option>
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
                                       value="{{ old('harga', intval($menu->harga)) }}" min="0" step="500" required>
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Minimal Porsi -->
                        <div class="col-12 col-md-6">
                            <label for="minimal_porsi" class="form-label fw-semibold">Minimal Pemesanan (Porsi) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" name="minimal_porsi" id="minimal_porsi" class="form-control @error('minimal_porsi') is-invalid @enderror" 
                                       value="{{ old('minimal_porsi', $menu->minimal_porsi) }}" min="1" required>
                                <span class="input-group-text bg-light text-muted">Porsi / Box</span>
                                @error('minimal_porsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi Sajian & Menu Lengkap</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Foto Menu Saat Ini & Upload Baru -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold d-block">Foto Menu Saat Ini</label>
                        <div class="d-flex align-items-center gap-3 p-3 bg-light rounded-3 border mb-3">
                            <img id="currentPhoto" src="{{ $menu->foto_url }}" alt="{{ $menu->nama_menu }}" class="rounded-3 border shadow-sm" style="width: 100px; height: 100px; object-fit: cover;">
                            <div>
                                <div class="small fw-semibold text-dark">{{ $menu->foto ?? 'Default Template Image' }}</div>
                                <small class="text-muted">Biarkan kosong di bawah jika tidak ingin mengganti foto saat ini.</small>
                            </div>
                        </div>

                        <label for="foto" class="form-label fw-semibold">Ganti Foto Menu (Opsional)</label>
                        <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*" onchange="previewNewImage(event)">
                        <div class="form-text">Maksimal 2MB. Format: JPG, PNG, WEBP.</div>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <!-- Preview Container Baru -->
                        <div class="mt-3 d-none" id="previewContainer">
                            <label class="form-label text-muted small d-block">Preview Foto Baru:</label>
                            <img id="imagePreview" src="#" alt="Preview Foto Baru" class="rounded-3 border shadow-sm" style="max-height: 180px; width: auto; object-fit: cover;">
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold">
                            <i class="ti ti-check me-1"></i> Perbarui Menu
                        </button>
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-light border px-4 py-2">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Info Card -->
    <div class="col-12 col-lg-4 mt-3 mt-lg-0">
        <div class="card border-0 shadow-sm bg-light">
            <div class="card-body p-4">
                <h6 class="fw-bold text-dark mb-3">
                    <i class="ti ti-info-circle text-primary me-1"></i> Informasi Sistem
                </h6>
                <div class="small text-muted mb-2">
                    <strong>ID Menu:</strong> #{{ $menu->id }}
                </div>
                <div class="small text-muted mb-2">
                    <strong>Dibuat Pada:</strong> {{ $menu->created_at ? $menu->created_at->format('d M Y, H:i') : '-' }}
                </div>
                <div class="small text-muted mb-3">
                    <strong>Terakhir Diperbarui:</strong> {{ $menu->updated_at ? $menu->updated_at->format('d M Y, H:i') : '-' }}
                </div>
                <div class="alert alert-info py-2 px-3 small border-0 mb-0">
                    Perubahan data menu akan langsung terlihat pada halaman katalog website tamu.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function previewNewImage(event) {
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
