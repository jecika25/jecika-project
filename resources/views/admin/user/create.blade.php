@extends('layouts.admin.app')

@section('title', 'Tambah User Baru')

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

            <!-- BACK & HEADER -->
            <div class="row mb-3">
                <div class="col-12">
                    <a href="{{ route('user.index') }}" class="btn btn-link text-decoration-none text-muted p-0 mb-2 d-inline-flex align-items-center gap-1">
                        <i class="ti ti-arrow-left"></i> Kembali ke Daftar User
                    </a>
                    <h3 class="fw-bold mb-1 text-dark">Tambah User Baru</h3>
                    <p class="text-muted small">Tambahkan akun pengguna baru untuk mengelola sistem aplikasi Nala Catering.</p>
                </div>
            </div>

            <!-- FORM CARD -->
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h5 class="card-title mb-0 fw-bold text-dark">Formulir Data User</h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('user.store') }}" method="POST">
                                @csrf

                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold">Nama Pengguna <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="name" 
                                           id="name" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name') }}" 
                                           placeholder="Contoh: Jessica Umairah" 
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">Email Pengguna <span class="text-danger">*</span></label>
                                    <input type="email" 
                                           name="email" 
                                           id="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email') }}" 
                                           placeholder="Contoh: user@nalacatering.com" 
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row g-3 mb-4">
                                    <!-- Password -->
                                    <div class="col-12 col-md-6">
                                        <label for="password" class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                                        <input type="password" 
                                               name="password" 
                                               id="password" 
                                               class="form-control @error('password') is-invalid @enderror" 
                                               placeholder="Minimal 8 karakter" 
                                               required>
                                        <small class="text-muted d-block mt-1">Minimal 8 karakter.</small>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="col-12 col-md-6">
                                        <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password <span class="text-danger">*</span></label>
                                        <input type="password" 
                                               name="password_confirmation" 
                                               id="password_confirmation" 
                                               class="form-control @error('password_confirmation') is-invalid @enderror" 
                                               placeholder="Ulangi password di atas" 
                                               required>
                                        <small class="text-muted d-block mt-1">Harus sama persis dengan password.</small>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex gap-2 pt-3 border-top">
                                    <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2">
                                        <i class="ti ti-device-floppy"></i>
                                        <span>Simpan User</span>
                                    </button>
                                    <a href="{{ route('user.index') }}" class="btn btn-light border px-4 py-2">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end main content -->
@endsection