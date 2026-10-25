@extends('layouts.admin.app')

@section('title', 'Data Pelanggan')

@section('content')
    <!-- start main content -->
    <main id="content" class="content">
        <div class="container-fluid p-0">

            <!-- Flash Message Alerts -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm" role="alert">
                    <i class="ti ti-circle-check fs-4 text-success"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm" role="alert">
                    <i class="ti ti-alert-triangle fs-4 text-danger"></i>
                    <div>{{ session('error') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(isset($errors) && $errors->any())
                <div class="alert alert-warning alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="ti ti-alert-circle fs-4 text-warning"></i>
                        <strong>Terdapat kesalahan pada input:</strong>
                    </div>
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- HEADER SECTION -->
            <div class="row mb-4">
                <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                    <div>
                        <h3 class="fw-bold mb-1 text-dark">Data Pelanggan Catering</h3>
                        <p class="text-muted mb-0 small">Daftar pelanggan terdaftar untuk reservasi dan pemesanan Nala Catering.</p>
                    </div>
                    <div>
                        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 shadow-sm px-3 py-2 fw-medium">
                            <i class="ti ti-user-plus fs-5"></i>
                            <span>Tambah Pelanggan</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- STATS CARDS -->
            <div class="row g-3 mb-4">
                <div class="col-12 col-sm-4">
                    <div class="card p-3 border-0 shadow-sm bg-primary bg-opacity-10 border-start border-primary border-4 h-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-shape icon-md bg-primary text-white rounded-3 p-3 d-flex align-items-center justify-content-center">
                                <i class="ti ti-users fs-3"></i>
                            </div>
                            <div>
                                <span class="text-muted small fw-medium">Total Pelanggan</span>
                                <h3 class="fw-bold mb-0 text-dark">{{ $stats['total'] }}</h3>
                                <small class="text-primary fw-medium">Terdaftar dalam sistem</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="card p-3 border-0 shadow-sm bg-info bg-opacity-10 border-start border-info border-4 h-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-shape icon-md bg-info text-white rounded-3 p-3 d-flex align-items-center justify-content-center">
                                <i class="ti ti-gender-male fs-3"></i>
                            </div>
                            <div>
                                <span class="text-muted small fw-medium">Laki-Laki (Male)</span>
                                <h3 class="fw-bold mb-0 text-dark">{{ $stats['male'] }}</h3>
                                <small class="text-info fw-medium">Pelanggan Pria</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="card p-3 border-0 shadow-sm bg-warning bg-opacity-10 border-start border-warning border-4 h-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-shape icon-md bg-warning text-white rounded-3 p-3 d-flex align-items-center justify-content-center">
                                <i class="ti ti-gender-female fs-3"></i>
                            </div>
                            <div>
                                <span class="text-muted small fw-medium">Perempuan (Female)</span>
                                <h3 class="fw-bold mb-0 text-dark">{{ $stats['female'] }}</h3>
                                <small class="text-warning fw-medium">Pelanggan Wanita</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEARCH & FILTER -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-3">
                    <form action="{{ route('pelanggan.index') }}" method="GET" class="row g-2 align-items-center">
                        <div class="col-12 col-md-6">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 text-muted">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" name="q" value="{{ request('q') }}" class="form-control border-start-0 ps-0" placeholder="Cari nama, email, atau no. telepon...">
                            </div>
                        </div>

                        <div class="col-6 col-md-4">
                            <select name="gender" class="form-select" onchange="this.form.submit()">
                                <option value="all">Semua Jenis Kelamin</option>
                                <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Laki-Laki (Male)</option>
                                <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Perempuan (Female)</option>
                                <option value="Other" {{ request('gender') == 'Other' ? 'selected' : '' }}>Lainnya (Other)</option>
                            </select>
                        </div>

                        <div class="col-6 col-md-2 d-flex gap-2">
                            <button type="submit" class="btn btn-primary flex-fill">
                                <i class="ti ti-filter"></i> Filter
                            </button>
                            @if(request()->hasAny(['q', 'gender']))
                                <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary" title="Reset">
                                    <i class="ti ti-refresh"></i>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- TABLE CARD -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 fw-bold text-dark">Daftar Pelanggan ({{ $pelanggans->total() }})</h5>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>No. Telepon / WhatsApp</th>
                                <th>Jenis Kelamin</th>
                                <th>Tgl Lahir</th>
                                <th class="text-end" style="width: 120px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pelanggans as $p)
                                <tr>
                                    <td><span class="text-muted small">#{{ $p->pelanggan_id }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar avatar-sm rounded-circle bg-light text-primary d-flex align-items-center justify-content-center fw-bold border" style="width: 36px; height: 36px;">
                                                {{ strtoupper(substr($p->first_name, 0, 1)) }}
                                            </div>
                                            <div class="fw-bold text-dark">{{ $p->first_name }} {{ $p->last_name }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $p->email }}</td>
                                    <td>
                                        @if($p->phone)
                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $p->phone) }}" target="_blank" class="text-decoration-none">
                                                <i class="ti ti-brand-whatsapp text-success me-1"></i>{{ $p->phone }}
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($p->gender == 'Male')
                                            <span class="badge bg-info-subtle text-info border border-info border-opacity-25">Laki-Laki</span>
                                        @elseif($p->gender == 'Female')
                                            <span class="badge bg-warning-subtle text-warning border border-warning border-opacity-25">Perempuan</span>
                                        @else
                                            <span class="badge bg-secondary-subtle text-secondary">{{ $p->gender ?? '-' }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $p->birthday ? date('d M Y', strtotime($p->birthday)) : '-' }}
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('pelanggan.edit', $p->pelanggan_id) }}" class="btn btn-outline-primary" title="Edit">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#delModal{{ $p->pelanggan_id }}">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="delModal{{ $p->pelanggan_id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered text-start">
                                                <div class="modal-content border-0 shadow">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h5 class="modal-title fs-6 fw-bold">Konfirmasi Hapus Pelanggan</h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body p-4">
                                                        Yakin ingin menghapus data pelanggan <strong>{{ $p->first_name }} {{ $p->last_name }}</strong>?
                                                    </div>
                                                    <div class="modal-footer bg-light">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('pelanggan.destroy', $p->pelanggan_id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">
                                        <i class="ti ti-users-minus fs-1 d-block mb-2 text-secondary"></i>
                                        Belum ada data pelanggan yang terdaftar.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($pelanggans->hasPages())
                    <div class="card-footer bg-white py-3">
                        <div class="d-flex justify-content-center">
                            {{ $pelanggans->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                @endif
            </div>

        </div>
        <!-- end main content -->
@endsection