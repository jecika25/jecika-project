<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Nala Catering - Solusi Catering & Prasmanan Terbaik')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Nala Catering, Catering Prasmanan, Nasi Kotak, Event Catering" name="keywords">
    <meta content="Nala Catering melayani kebutuhan catering pernikahan, prasmanan acara, rapat kantor, dan tumpeng syukuran dengan rasa otentik dan kualitas terbaik." name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets-guest/img/nala-logo.png') }}">

    <!-- Partial View: CSS & Fonts -->
    @include('layouts.guest.css')

    @yield('styles')
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Partial View: Navbar -->
    @include('layouts.guest.navbar')

    <!-- Dynamic Content -->
    @yield('content')

    <!-- Partial View: Footer -->
    @include('layouts.guest.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top text-white"><i class="fa fa-arrow-up"></i></a>

    <!-- Modals -->
    @yield('modals')

    <!-- Partial View: JavaScript Libraries -->
    @include('layouts.guest.js')

    @yield('scripts')
</body>

</html>