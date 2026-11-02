@extends('guest')

@section('title', 'Home - Nala Catering')

@section('content')
<div class="container py-5 text-center">
    <h1 class="display-4 fw-bold mb-3">Selamat Datang di Nala Catering</h1>
    <p class="lead text-muted mb-4">Solusi Catering & Prasmanan Terbaik untuk Acara Anda.</p>
    <a href="{{ url('/auth') }}" class="btn btn-primary btn-lg rounded-pill px-4 me-2">Login Sekarang</a>
    <a href="{{ url('/register') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4">Daftar Akun</a>
</div>
@endsection