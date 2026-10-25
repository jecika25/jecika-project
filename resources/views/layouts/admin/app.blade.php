<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Dashboard') - Nala Catering</title>
    
    <!-- Partial View: Admin CSS -->
    @include('layouts.admin.css')
    
    @yield('styles')
</head>
<body>
    <!-- Mobile Overlay -->
    <div id="overlay" class="overlay"></div>

    <!-- Partial View: Header / Topbar -->
    @include('layouts.admin.header')

    <!-- Partial View: Sidebar -->
    @include('layouts.admin.sidebar')

    <!-- Main Content Dynamic -->
    @yield('content')

    <!-- Partial View: Footer -->
    @include('layouts.admin.footer')

    <!-- Partial View: JS -->
    @include('layouts.admin.js')

    @yield('scripts')
</body>
</html>