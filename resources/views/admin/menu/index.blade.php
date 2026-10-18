@extends('admin')

@section('title', 'Manajemen Menu Catering')
@section('page_title', 'Menu Catering')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
        <div>
            <h3 class="fw-bold mb-1 text-dark">Daftar Menu Catering</h3>
            <p class="text-muted mb-0 small">Kelola seluruh sajian, paket prasmanan, dan menu hidangan Nala Catering di sini.</p>
        </div>
        <div>
            <a href="{{ route('admin.menu.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 shadow-sm px-3 py-2 fw-medium">
                <i class="ti ti-plus fs-5"></i>
                <span>Tambah Menu Baru</span>
            </a>
        </div>
    </div>
</div>

<!-- STATS SUMMARY CARDS -->
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card p-3 border-0 shadow-sm bg-primary bg-opacity-10 border-start border-primary border-4">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-shape icon-md bg-primary text-white rounded-3 shadow-sm">
                    <i class="ti ti-tools-kitchen fs-3"></i>
                </div>
                <div>
                    <span class="text-muted small fw-medium">Total Sajian</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ $stats['total'] }}</h3>
                    <small class="text-primary fw-medium">Semua item terdaftar</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card p-3 border-0 shadow-sm bg-success bg-opacity-10 border-start border-success border-4">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-shape icon-md bg-success text-white rounded-3 shadow-sm">
                    <i class="ti ti-circle-check fs-3"></i>
                </div>
                <div>
                    <span class="text-muted small fw-medium">Menu Tersedia</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ $stats['tersedia'] }}</h3>
                    <small class="text-success fw-medium">Siap dipesan</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card p-3 border-0 shadow-sm bg-danger bg-opacity-10 border-start border-danger border-4">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-shape icon-md bg-danger text-white rounded-3 shadow-sm">
                    <i class="ti ti-circle-x fs-3"></i>
                </div>
                <div>
                    <span class="text-muted small fw-medium">Menu Habis</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ $stats['habis'] }}</h3>
                    <small class="text-danger fw-medium">Stok tidak tersedia</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card p-3 border-0 shadow-sm bg-warning bg-opacity-10 border-start border-warning border-4">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-shape icon-md bg-warning text-white rounded-3 shadow-sm">
                    <i class="ti ti-category fs-3"></i>
                </div>
                <div>
                    <span class="text-muted small fw-medium">Variasi Kategori</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ $stats['kategori_count'] }}</h3>
                    <small class="text-warning fw-semibold">Pilihan sajian</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FILTER & SEARCH BAR -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-3">
        <form action="{{ route('admin.menu.index') }}" method="GET" class="row g-2 align-items-center">
            <div class="col-12 col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted">
                        <i class="ti ti-search"></i>
                    </span>
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control border-start-0 ps-0" placeholder="Cari nama menu atau deskripsi...">
                </div>
            </div>

            <div class="col-6 col-md-3">
                <select name="kategori" class="form-select" onchange="this.form.submit()">
                    <option value="all">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('kategori') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-6 col-md-3">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="all">Semua Status</option>
                    <option value="Tersedia" {{ request('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Habis" {{ request('status') == 'Habis' ? 'selected' : '' }}>Habis</option>
                </select>
            </div>

            <div class="col-12 col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary flex-fill">
                    <i class="ti ti-filter"></i> Filter
                </button>
                @if(request()->hasAny(['q', 'kategori', 'status']))
                    <a href="{{ route('admin.menu.index') }}" class="btn btn-outline-secondary" title="Reset Filter">
                        <i class="ti ti-refresh"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- MENU TABLE CARD -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold text-dark">Data Sajian Menu ({{ $menus->total() }})</h5>
        <span class="text-muted small">Halaman {{ $menus->currentPage() }} dari {{ $menus->lastPage() }}</span>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 70px;">Foto</th>
                    <th>Nama Menu & Deskripsi</th>
                    <th>Kategori</th>
                    <th>Harga / Porsi</th>
                    <th>Min. Order</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 130px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($menus as $menu)
                    <tr>
                        <td>
                            <div class="avatar avatar-md rounded-3 border overflow-hidden">
                                <img src="{{ $menu->foto_url }}" alt="{{ $menu->nama_menu }}">
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark fs-6">{{ $menu->nama_menu }}</div>
                            <div class="text-muted small text-truncate" style="max-width: 320px;">
                                {{ $menu->deskripsi ?? 'Tidak ada deskripsi' }}
                            </div>
                        </td>
                        <td>
                            @php
                                $badgeColor = match($menu->kategori) {
                                    'Paket Prasmanan' => 'bg-primary',
                                    'Main Course' => 'bg-info',
                                    'Starter' => 'bg-warning text-dark',
                                    'Dessert' => 'bg-success',
                                    'Beverage' => 'bg-secondary',
                                    default => 'bg-dark'
                                };
                            @endphp
                            <span class="badge {{ $badgeColor }} px-2 py-1">{{ $menu->kategori }}</span>
                        </td>
                        <td>
                            <span class="fw-bold text-primary">{{ $menu->formatted_harga }}</span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border px-2 py-1">
                                <i class="ti ti-users me-1"></i>{{ $menu->minimal_porsi }} Porsi
                            </span>
                        </td>
                        <td>
                            @if($menu->status === 'Tersedia')
                                <span class="badge bg-success-subtle text-success px-2 py-1 border border-success border-opacity-25">
                                    <i class="ti ti-circle-check me-1"></i>Tersedia
                                </span>
                            @else
                                <span class="badge bg-danger-subtle text-danger px-2 py-1 border border-danger border-opacity-25">
                                    <i class="ti ti-circle-x me-1"></i>Habis
                                </span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-outline-primary" title="Edit Menu">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger" title="Hapus Menu" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $menu->id }}">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </div>

                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal{{ $menu->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $menu->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered text-start">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title fs-6 fw-bold" id="deleteModalLabel{{ $menu->id }}">
                                                <i class="ti ti-alert-triangle me-2"></i>Konfirmasi Hapus
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <p class="mb-2">Apakah Anda yakin ingin menghapus menu berikut?</p>
                                            <div class="d-flex align-items-center gap-3 p-3 bg-light rounded-3 border">
                                                <img src="{{ $menu->foto_url }}" alt="{{ $menu->nama_menu }}" class="avatar avatar-sm rounded-circle">
                                                <div>
                                                    <div class="fw-bold text-dark">{{ $menu->nama_menu }}</div>
                                                    <small class="text-muted">{{ $menu->kategori }} &bull; {{ $menu->formatted_harga }}</small>
                                                </div>
                                            </div>
                                            <p class="text-danger small mt-2 mb-0">Tindakan ini tidak dapat dibatalkan.</p>
                                        </div>
                                        <div class="modal-footer bg-light">
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Ya, Hapus Sekarang</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="text-muted">
                                <i class="ti ti-tools-kitchen-2-off fs-1 d-block mb-2 text-secondary"></i>
                                <h5>Belum ada menu catering yang cocok</h5>
                                <p class="small mb-3">Silakan tambahkan menu baru atau ubah kriteria pencarian Anda.</p>
                                <a href="{{ route('admin.menu.create') }}" class="btn btn-primary btn-sm">
                                    <i class="ti ti-plus"></i> Tambah Menu Sekarang
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($menus->hasPages())
        <div class="card-footer bg-white py-3">
            <div class="d-flex justify-content-center">
                {{ $menus->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endif
</div>
@endsection
