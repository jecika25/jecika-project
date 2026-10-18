@extends('admin')

@section('title', 'Tambah Pelanggan Baru')
@section('page_title', 'Tambah Pelanggan')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <a href="{{ route('pelanggan.index') }}" class="btn btn-link text-decoration-none text-muted p-0 mb-2 d-inline-flex align-items-center gap-1">
            <i class="ti ti-arrow-left"></i> Kembali ke Data Pelanggan
        </a>
        <h3 class="fw-bold mb-1 text-dark">Tambah Pelanggan Baru</h3>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('pelanggan.store') }}" method="POST">
                    @csrf

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nama Depan <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required>
                            @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nama Belakang <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required>
                            @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">No. Telepon / WhatsApp</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="081234567890">
                            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tanggal Lahir</label>
                            <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday') }}">
                            @error('birthday') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Jenis Kelamin</label>
                            <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                <option value="" selected>-- Pilih Jenis Kelamin --</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Laki-Laki (Male)</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Perempuan (Female)</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Lainnya (Other)</option>
                            </select>
                            @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 pt-3 border-top">
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold">
                            <i class="ti ti-device-floppy me-1"></i> Simpan Pelanggan
                        </button>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-light border px-4 py-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
