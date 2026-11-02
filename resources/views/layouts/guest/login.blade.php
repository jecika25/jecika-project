@extends('layouts.guest.index') {{-- Sesuaikan master layout kamu --}}

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4 text-center">Login</h3>

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('login.process') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label font-weight-semibold">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" value="{{ old('username') }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label font-weight-semibold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold mb-3">Login</button>

                        <!-- TOMBOL / LINK REGISTER DI BAWAH BUTTON LOGIN -->
                        <div class="text-center">
                            <small class="text-muted">Belum punya akun? 
                                <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-none">Daftar / Register di sini</a>
                            </small>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection