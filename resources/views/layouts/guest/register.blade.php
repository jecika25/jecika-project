@extends('guest')

@section('title', 'Register - Nala Catering')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4 text-center">Daftar Akun</h3>

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label font-weight-semibold">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label font-weight-semibold">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label font-weight-semibold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection