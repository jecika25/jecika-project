<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Dashboard') - Nala Catering</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets-admin/images/favicon_io/favicon-32x32.png') }}">
    
    <!-- Google Fonts Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- InApp Admin CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/css/style.css') }}">
    
    @yield('styles')
</head>
<body>
    <!-- Mobile Overlay -->
    <div id="overlay" class="overlay"></div>

    <!-- TOPBAR -->
    <nav id="topbar" class="navbar bg-white border-bottom fixed-top topbar px-3 px-lg-4 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <!-- Desktop Collapse Toggle -->
            <button id="toggleBtn" class="d-none d-lg-inline-flex btn btn-light btn-sm rounded-circle border shadow-sm p-2" title="Toggle Sidebar">
                <i class="ti ti-layout-sidebar-left-expand fs-5 text-secondary"></i>
            </button>

            <!-- Mobile Toggle -->
            <button id="mobileBtn" class="btn btn-light btn-sm d-lg-none rounded-circle border shadow-sm p-2" title="Open Menu">
                <i class="ti ti-menu-2 fs-5 text-secondary"></i>
            </button>

            <!-- Page Title / Breadcrumb -->
            <div class="d-none d-sm-block">
                <h5 class="mb-0 fw-bold text-dark">@yield('page_title', 'Dashboard')</h5>
                <small class="text-muted">Nala Catering Administration System</small>
            </div>
        </div>

        <!-- Topbar Right Actions -->
        <div class="d-flex align-items-center gap-2">
            <!-- View Guest Website -->
            <a href="{{ route('guest.menu') }}" target="_blank" class="btn btn-outline-warning btn-sm d-none d-md-inline-flex align-items-center gap-1 text-dark fw-medium">
                <i class="ti ti-external-link"></i>
                <span>Lihat Web Tamu</span>
            </a>

            <!-- Notification Dropdown -->
            <div class="dropdown">
                <button class="btn btn-light btn-sm rounded-circle border p-2 position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-bell fs-5 text-secondary"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">Notifikasi Baru</span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end shadow-sm border-0 p-2" style="width: 280px;">
                    <div class="p-2 border-bottom">
                        <h6 class="mb-0 fw-semibold">Pemberitahuan</h6>
                        <small class="text-muted">Update terbaru sistem catering</small>
                    </div>
                    <div class="py-2">
                        <a href="#" class="dropdown-item d-flex gap-2 align-items-start py-2">
                            <span class="badge bg-success-subtle text-success mt-1"><i class="ti ti-check"></i></span>
                            <div>
                                <div class="small fw-semibold">Sistem Siap Digunakan</div>
                                <div class="text-muted" style="font-size: 11px;">Data menu berhasil dimuat</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- User Profile Dropdown -->
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar avatar-sm me-2 rounded-circle border">
                        <img src="{{ asset('assets-admin/images/avatar/avatar-1.jpg') }}" alt="Admin Avatar" class="rounded-circle">
                    </div>
                    <div class="d-none d-lg-block text-start">
                        <div class="fw-semibold text-dark lh-sm" style="font-size: 13px;">Administrator</div>
                        <small class="text-muted" style="font-size: 11px;">Admin Nala</small>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2">
                    <li><h6 class="dropdown-header">Kelola Akun</h6></li>
                    <li><a class="dropdown-item d-flex align-items-center gap-2" href="#"><i class="ti ti-user"></i> Profil</a></li>
                    <li><a class="dropdown-item d-flex align-items-center gap-2" href="#"><i class="ti ti-settings"></i> Pengaturan</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger d-flex align-items-center gap-2" href="{{ route('guest.home') }}"><i class="ti ti-logout"></i> Keluar ke Home</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- SIDEBAR -->
    <aside id="sidebar" class="sidebar">
        <!-- Logo Area -->
        <div class="logo-area">
            <a href="{{ route('admin.menu.index') }}" class="d-inline-flex align-items-center text-decoration-none">
                <img src="{{ asset('assets-admin/images/nala-logo.png') }}"
                     alt="Logo Nala Catering"
                     width="40"
                     height="40"
                     style="object-fit: contain;">
                <span class="logo-text ms-2 fw-bold text-dark fs-6" style="white-space: nowrap;">
                    Nala Catering
                </span>
            </a>
        </div>

        <!-- Navigation Links -->
        <ul class="nav flex-column nav-list">
            <li class="nav-header">Menu Utama</li>

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin') && !request()->is('admin/*') ? 'active' : '' }}" href="{{ route('admin.menu.index') }}">
                    <i class="ti ti-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <!-- Manajemen Menu Catering -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.menu.index') ? 'active' : '' }}" href="{{ route('admin.menu.index') }}">
                    <i class="ti ti-tools-kitchen-2"></i>
                    <span class="nav-text">Menu Catering</span>
                </a>
            </li>

            <!-- Tambah Menu Baru -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.menu.create') ? 'active' : '' }}" href="{{ route('admin.menu.create') }}">
                    <i class="ti ti-circle-plus"></i>
                    <span class="nav-text">Tambah Menu</span>
                </a>
            </li>

            <li class="nav-header">Manajemen Data</li>

            <!-- Pelanggan -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}" href="{{ route('pelanggan.index') }}">
                    <i class="ti ti-users"></i>
                    <span class="nav-text">Data Pelanggan</span>
                </a>
            </li>

            <!-- Pesanan Masuk -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.pesanan.*') ? 'active' : '' }}" href="{{ route('admin.pesanan.index') }}">
                    <i class="ti ti-receipt"></i>
                    <span class="nav-text">Pesanan Masuk</span>
                </a>
            </li>

            <li class="nav-header">Navigasi Eksternal</li>

            <!-- Tampilan Tamu -->
            <li class="nav-item">
                <a class="nav-link text-warning" href="{{ route('guest.menu') }}" target="_blank">
                    <i class="ti ti-world"></i>
                    <span class="nav-text">Katalog Tamu</span>
                </a>
            </li>
        </ul>

        <!-- Bottom Sidebar Info -->
        <div class="p-3 border-top mt-auto logo-text">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-success-subtle text-success rounded-pill px-2 py-1">Online</span>
                <small class="text-muted">Versi UAS 1.0</small>
            </div>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
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

            @if($errors->any())
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

            <!-- Dynamic Content -->
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="mt-5 pt-4 text-center text-muted border-top">
            <p class="mb-0 small">
                &copy; {{ date('Y') }} <strong>Nala Catering</strong> - Proyek UAS Pemrograman Framework Web. Didesain dengan template InApp Dashboard.
            </p>
        </footer>
    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const topbar = document.getElementById('topbar');
            const toggleBtn = document.getElementById('toggleBtn');
            const mobileBtn = document.getElementById('mobileBtn');
            const overlay = document.getElementById('overlay');

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function () {
                    sidebar.classList.toggle('collapsed');
                    content.classList.toggle('full');
                    topbar.classList.toggle('full');
                });
            }

            if (mobileBtn) {
                mobileBtn.addEventListener('click', function () {
                    sidebar.classList.add('mobile-show');
                    overlay.classList.add('show');
                });
            }

            if (overlay) {
                overlay.addEventListener('click', function () {
                    sidebar.classList.remove('mobile-show');
                    overlay.classList.remove('show');
                });
            }
        });
    </script>

    @yield('scripts')
</body>
</html>