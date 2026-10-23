<!-- Navbar Start -->
<div class="container-fluid nav-bar py-2">
    <div class="container">
        <nav class="navbar navbar-light navbar-expand-lg py-2">
            <a href="{{ route('guest.home') }}" class="navbar-brand py-0">
                <img src="{{ asset('assets-guest/img/nala-logo.png') }}" alt="Nala Catering & Food Logo">
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('guest.home') }}" class="nav-item nav-link {{ request()->routeIs('guest.home') ? 'active' : '' }}">Home</a>
                    <a href="#about-section" class="nav-item nav-link">About</a>
                    <a href="#services-section" class="nav-item nav-link">Services</a>
                    <a href="#events-section" class="nav-item nav-link">Events</a>
                    <a href="#menu-section" class="nav-item nav-link {{ request()->routeIs('guest.menu') ? 'active' : '' }}">Menu</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu bg-light border-0 shadow-sm m-0">
                            <a href="#paketcatering-section" class="dropdown-item">Paket Catering</a>
                            <a href="#booking-section" class="dropdown-item">Booking & Konsultasi</a>
                            <a href="{{ route('admin.menu.index') }}" class="dropdown-item text-primary fw-semibold">
                                <i class="fas fa-lock me-1"></i> Admin Area
                            </a>
                        </div>
                    </div>
                    <a href="#contact-section" class="nav-item nav-link">Contact</a>
                </div>
                <button class="btn-search btn btn-primary me-3 rounded-circle d-none d-md-inline-flex" data-bs-toggle="modal" data-bs-target="#searchModal" title="Cari Menu">
                    <i class="fas fa-search text-white"></i>
                </button>
                <a href="#menu-section" class="btn btn-primary py-2 px-4 rounded-pill text-white fw-bold">Book Now</a>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title text-primary" id="searchModalLabel"><i class="fas fa-utensils me-2"></i>Pencarian Menu Catering</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="w-75 mx-auto">
                    <form action="{{ route('guest.menu') }}#menu-section" method="GET">
                        <div class="input-group d-flex shadow-sm">
                            <input type="search" name="q" value="{{ request('q') }}" class="form-control bg-light p-3 border-0" placeholder="Ketik sajian favorit Anda (contoh: Rendang, Ayam Panggang, Tumpeng, Pudding...)" aria-describedby="search-btn-modal" autofocus>
                            <button type="submit" id="search-btn-modal" class="btn btn-primary text-white px-4 fw-bold"><i class="fa fa-search me-1"></i> Temukan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->
