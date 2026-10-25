@extends('layouts.admin.app')

@section('title', 'Data User')

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
                        <h3 class="fw-bold mb-1 text-dark">Data User</h3>
                        <p class="text-muted mb-0 small">Kelola data seluruh akun pengguna dan administrator sistem Nala Catering.</p>
                    </div>
                    <div>
                        <a href="{{ route('user.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 shadow-sm px-3 py-2 fw-medium">
                            <i class="ti ti-plus fs-5"></i>
                            <span>Tambah User Baru</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- STATS CARD -->
            <div class="row g-3 mb-4">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card p-3 border-0 shadow-sm bg-primary bg-opacity-10 border-start border-primary border-4 h-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-shape icon-md bg-primary text-white rounded-3 shadow-sm p-3 d-flex align-items-center justify-content-center">
                                <i class="ti ti-users fs-3"></i>
                            </div>
                            <div>
                                <span class="text-muted small fw-medium">Total Akun Terdaftar</span>
                                <h3 class="fw-bold mb-0 text-dark">{{ $stats['total'] }}</h3>
                                <small class="text-primary fw-medium">Pengguna Aktif</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABLE CARD -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 fw-bold text-dark">Daftar User ({{ $users->total() }})</h5>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 60px;">#</th>
                                <th>Nama Pengguna</th>
                                <th>Email</th>
                                <th>Terdaftar Pada</th>
                                <th class="text-end" style="width: 140px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $u)
                                <tr>
                                    <td><span class="text-muted small">#{{ $u->id }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar avatar-sm rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center fw-bold border" style="width: 38px; height: 38px;">
                                                {{ strtoupper(substr($u->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark">{{ $u->name }}</div>
                                                <small class="text-muted">ID: {{ $u->id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $u->email }}" class="text-decoration-none text-body">
                                            <i class="ti ti-mail text-muted me-1"></i>{{ $u->email }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="text-muted small">
                                            {{ $u->created_at ? $u->created_at->format('d M Y, H:i') : '-' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('user.edit', $u->id) }}" class="btn btn-outline-primary" title="Edit User">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger" title="Hapus User" data-bs-toggle="modal" data-bs-target="#delModal{{ $u->id }}">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Delete Confirmation Modal -->
                                        <div class="modal fade" id="delModal{{ $u->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered text-start">
                                                <div class="modal-content border-0 shadow">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h5 class="modal-title fs-6 fw-bold">Konfirmasi Hapus User</h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body p-4">
                                                        Apakah Anda yakin ingin menghapus akun user <strong>{{ $u->name }}</strong> ({{ $u->email }})?
                                                    </div>
                                                    <div class="modal-footer bg-light">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('user.destroy', $u->id) }}" method="POST">
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
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="ti ti-user-x fs-1 d-block mb-2 text-secondary"></i>
                                        Belum ada data user yang terdaftar.
                                        <div class="mt-2">
                                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">
                                                <i class="ti ti-plus"></i> Tambah User Sekarang
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($users->hasPages())
                    <div class="card-footer bg-white py-3">
                        <div class="d-flex justify-content-center">
                            {{ $users->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                @endif
            </div>

        </div>
        <!-- end main content -->
@endsection