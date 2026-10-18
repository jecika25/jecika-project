@extends('admin')

@section('title', 'Manajemen Paket Catering')
@section('page_title', 'Paket Catering')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
        <div>
            <h3 class="fw-bold mb-1 text-dark">Daftar Paket Catering</h3>
            <p class="text-muted mb-0 small">Kelola master paket prasmanan, nasi box, tumpeng, pernikahan, dan coffee break Nala Catering.</p>
        </div>
        <div>
            <a href="{{ route('admin.paket.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 shadow-sm px-3 py-2 fw-medium">
                <i class="ti ti-plus fs-5"></i>
                <span>Tambah Paket Baru</span>
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
                    <i class="ti ti-box fs-3"></i>
                </div>
                <div>
                    <span class="text-muted small fw-medium">Total Paket</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ $stats['total'] }}</h3>
                    <small class="text-primary fw-medium">Semua paket terdaftar</small>
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
                    <span class="text-muted small fw-medium">Paket Tersedia</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ $stats['tersedia'] }}</h3>
                    <small class="text-success fw-medium">Siap dipesan klien</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card p-3 border-0 shadow-sm bg-warning bg-opacity-10 border-start border-warning border-4">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-shape icon-md bg-warning text-white rounded-3 shadow-sm">
                    <i class="ti ti-tools-kitchen-2 fs-3"></i>
                </div>
                <div>
                    <span class="text-muted small fw-medium">Paket Prasmanan</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ $stats['prasmanan'] }}</h3>
                    <small class="text-warning fw-semibold">Pilihan prasmanan</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card p-3 border-0 shadow-sm bg-info bg-opacity-10 border-start border-info border-4">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-shape icon-md bg-info text-white rounded-3 shadow-sm">
                    <i class="ti ti-package fs-3"></i>
                </div>
                <div>
                    <span class="text-muted small fw-medium">Paket Nasi Box</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ $stats['nasi_box'] }}</h3>
                    <small class="text-info fw-semibold">Pilihan box acara</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FILTER & SEARCH BAR -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-3">
        <form action="{{ route('admin.paket.index') }}" method="GET" class="row g-2 align-items-center">
            <div class="col-12 col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted">
                        <i class="ti ti-search"></i>
                    </span>
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control border-start-0 ps-0" placeholder="Cari nama paket, fasilitas, menu...">
                </div>
            </div>

            <div class="col-6 col-md-3">
                <select name="jenis" class="form-select" onchange="this.form.submit()">
                    <option value="all">Semua Jenis Paket</option>
                    @foreach($jenisOptions as $opt)
                        <option value="{{ $opt }}" {{ request('jenis') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-6 col-md-3">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="all">Semua Status</option>
                    <option value="Tersedia" {{ request('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Penuh / Pre-Order" {{ request('status') == 'Penuh / Pre-Order' ? 'selected' : '' }}>Penuh / Pre-Order</option>
                    <option value="Nonaktif" {{ request('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div class="col-12 col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-secondary w-100">
                    <i class="ti ti-filter me-1"></i> Filter
                </button>
                @if(request('q') || (request('jenis') && request('jenis') !== 'all') || (request('status') && request('status') !== 'all'))
                    <a href="{{ route('admin.paket.index') }}" class="btn btn-light border text-danger" title="Reset Filter">
                        <i class="ti ti-x"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- PAKET LIST TABLE -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold text-dark">Data Paket Catering (Master Table 3)</h5>
        <span class="badge bg-light text-muted border">Total: {{ $pakets->total() }} Data</span>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-3" style="width: 50px;">No</th>
                    <th style="width: 70px;">Foto</th>
                    <th>Nama Paket</th>
                    <th>Jenis</th>
                    <th>Harga Paket</th>
                    <th>Min. Order</th>
                    <th>Status</th>
                    <th class="text-end pe-3" style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pakets as $index => $item)
                    <tr>
                        <td class="ps-3 fw-semibold text-muted">
                            {{ $pakets->firstItem() + $index }}
                        </td>
                        <td>
                            <img src="{{ $item->foto_url }}" alt="{{ $item->nama_paket }}" class="rounded-3 shadow-sm border" style="width: 54px; height: 54px; object-fit: cover;">
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ $item->nama_paket }}</div>
                            @if($item->deskripsi)
                                <div class="text-muted small text-truncate" style="max-width: 320px;" title="{{ $item->deskripsi }}">
                                    {{ Str::limit($item->deskripsi, 60) }}
                                </div>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1">
                                {{ $item->jenis_paket }}
                            </span>
                        </td>
                        <td class="fw-bold text-dark">
                            {{ $item->formatted_harga }}
                            @if($item->jenis_paket == 'Prasmanan' || $item->jenis_paket == 'Nasi Box' || $item->jenis_paket == 'Coffee Break')
                                <small class="text-muted fw-normal d-block" style="font-size: 11px;">/ porsi</small>
                            @else
                                <small class="text-muted fw-normal d-block" style="font-size: 11px;">/ paket</small>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">
                                {{ $item->minimal_porsi }} Porsi
                            </span>
                        </td>
                        <td>
                            @if($item->status == 'Tersedia')
                                <span class="badge bg-success-subtle text-success px-2 py-1 d-inline-flex align-items-center gap-1">
                                    <span class="p-1 bg-success rounded-circle"></span> Tersedia
                                </span>
                            @elseif($item->status == 'Penuh / Pre-Order')
                                <span class="badge bg-warning-subtle text-warning px-2 py-1 d-inline-flex align-items-center gap-1">
                                    <span class="p-1 bg-warning rounded-circle"></span> Pre-Order
                                </span>
                            @else
                                <span class="badge bg-danger-subtle text-danger px-2 py-1 d-inline-flex align-items-center gap-1">
                                    <span class="p-1 bg-danger rounded-circle"></span> Nonaktif
                                </span>
                            @endif
                        </td>
                        <td class="text-end pe-3">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.paket.edit', $item->id) }}" class="btn btn-light border text-primary" title="Edit Paket">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <button type="button" class="btn btn-light border text-danger" title="Hapus Paket" 
                                        onclick="confirmDelete('{{ $item->id }}', '{{ addslashes($item->nama_paket) }}')">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <div class="text-muted">
                                <i class="ti ti-box-off fs-1 d-block mb-2 text-secondary"></i>
                                <strong>Tidak ada data paket catering ditemukan.</strong>
                                <p class="small mb-3">Silakan sesuaikan kata kunci pencarian atau tambahkan paket baru.</p>
                                <a href="{{ route('admin.paket.create') }}" class="btn btn-primary btn-sm">
                                    <i class="ti ti-plus me-1"></i> Tambah Paket Baru
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($pakets->hasPages())
        <div class="card-footer bg-white py-3 border-top d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <div class="small text-muted">
                Menampilkan {{ $pakets->firstItem() }} sampai {{ $pakets->lastItem() }} dari total {{ $pakets->total() }} paket
            </div>
            <div>
                {{ $pakets->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endif
</div>

<!-- Modal Hapus Paket -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow">
            <div class="modal-body text-center p-4">
                <div class="avatar avatar-lg bg-danger-subtle text-danger rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                    <i class="ti ti-alert-triangle fs-2"></i>
                </div>
                <h5 class="fw-bold mb-1">Hapus Paket Ini?</h5>
                <p class="text-muted small mb-4" id="deleteTargetText">Data paket ini akan dihapus secara permanen dari database master.</p>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="d-flex gap-2 justify-content-center">
                        <button type="button" class="btn btn-light border px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger px-3">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function confirmDelete(id, nama) {
        const form = document.getElementById('deleteForm');
        form.action = "{{ url('admin/paket') }}/" + id;
        document.getElementById('deleteTargetText').innerHTML = 'Apakah Anda yakin ingin menghapus paket <strong>"' + nama + '"</strong>? Tindakan ini tidak dapat dibatalkan.';
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }
</script>
@endsection
