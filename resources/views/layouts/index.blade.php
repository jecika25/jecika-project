<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nala Catering')</title>

    {{-- Start CSS --}}
    <!-- Nanti link CSS template Volt ditaruh di sini -->
    {{-- End CSS --}}
</head>
<body>

    {{-- start sidebar --}}
    <!-- Nanti kode menu sidebar ditaruh di sini -->
    {{-- end sidebar --}}

    <main class="content">

        {{-- start header --}}
        <!-- Nanti kode navbar/header ditaruh di sini -->
        {{-- end header --}}

        {{-- start main content --}}
        <!-- Ini adalah bagian ajaibnya. Kode dari index.blade.php mu akan otomatis masuk ke sini! -->
        @yield('content')
        {{-- end main content --}}

        {{-- start footer --}}
        <!-- Nanti kode footer ditaruh di sini -->
        {{-- end footer --}}

    </main>

    {{-- Start JS --}}
    <!-- Nanti link JavaScript template Volt ditaruh di sini -->
    {{-- End JS --}}

</body>
</html>