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
            <li class="nav-item {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.menu.index') }}">
                    <i class="ti ti-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-header">Master Data (3 Tabel)</li>

            <!-- Master 1: Menu Catering -->
            <li class="nav-item {{ request()->routeIs('admin.menu.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.menu.index') }}">
                    <i class="ti ti-tools-kitchen-2"></i>
                    <span class="nav-text">1. Menu Catering</span>
                </a>
            </li>

            <!-- Master 2: Pelanggan -->
            <li class="nav-item {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pelanggan.index') }}">
                    <i class="ti ti-users"></i>
                    <span class="nav-text">2. Data Pelanggan</span>
                </a>
            </li>

            <!-- Master 3: Paket Catering -->
           <li class="nav-item {{ request()->routeIs('admin.paket.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.paket.index') }}">
                    <i class="ti ti-box"></i>
                    <span class="nav-text">3. Paket Catering</span>
                </a>
            </li>

            <li class="nav-header">Transaksi & Reservasi</li>

            <!-- Pesanan Masuk -->
            <li class="nav-item {{ request()->routeIs('admin.pesanan.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.pesanan.index') }}">
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