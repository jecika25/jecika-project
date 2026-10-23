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