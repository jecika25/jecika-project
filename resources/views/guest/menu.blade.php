@extends('guest')

@section('title', 'Nala Catering - Book Nala Your Event, Our Culinary Passion')

@section('content')

<!-- Hero Start -->
<div class="container-fluid bg-light py-6 my-6 mt-0 hero-header">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7 col-md-12">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-4 animated bounceInDown">WELCOME TO CATERSERV</small>
                <h1 class="display-1 mb-4 animated bounceInDown" style="font-family: 'Playball', cursive; font-weight: 400;">
                    Book <span class="text-primary">Nala</span> Your Event,<br>Our Culinary Passion
                </h1>
                <a href="#menu-section" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated bounceInLeft text-white fw-bold">Book Now</a>
                <a href="#about-section" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 animated bounceInLeft text-white fw-bold">Know More</a>
            </div>
            <div class="col-lg-5 col-md-12 text-center">
                <img src="{{ asset('assets-guest/img/hero.png') }}" class="img-fluid rounded animated zoomIn" alt="Nala Catering Food Presentation">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- About Start -->
<div class="container-fluid py-6" id="about-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden rounded shadow-sm">
                    <img src="{{ asset('assets-guest/img/about.jpg') }}" class="img-fluid w-100" alt="Tentang Nala Catering">
                </div>
            </div>
            <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Tentang Kami</small>
                <h1 class="display-5 mb-4" style="font-family: 'Playball', cursive;">Citarasa Tradisional & Modern Berkualitas Prima</h1>
                <p class="mb-4 text-muted lh-lg">
                    <strong>Nala Catering</strong> berkomitmen menyajikan aneka sajian kuliner istimewa dengan bahan baku segar, resep bumbu otentik nusantara dan internasional, serta higienitas yang terjamin. Kami hadir untuk melengkapi setiap momen berharga Anda—dari pernikahan megah, arisan keluarga, syukuran, hingga rapat korporat.
                </p>
                <div class="row g-4 text-dark mb-5">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle fa-2x text-primary me-3"></i>
                            <div>
                                <h5 class="mb-0 fw-bold">100% Halal & Higienis</h5>
                                <small class="text-muted">Bahan pilihan berkualitas tinggi</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-clock fa-2x text-primary me-3"></i>
                            <div>
                                <h5 class="mb-0 fw-bold">Tepat Waktu</h5>
                                <small class="text-muted">Pengiriman sigap & armada handal</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-utensils fa-2x text-primary me-3"></i>
                            <div>
                                <h5 class="mb-0 fw-bold">Chef Berpengalaman</h5>
                                <small class="text-muted">Racikan bumbu kaya rempah asli</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-heart fa-2x text-primary me-3"></i>
                            <div>
                                <h5 class="mb-0 fw-bold">Kustomisasi Menu</h5>
                                <small class="text-muted">Sesuaikan budget & selera tamu</small>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#menu-section" class="btn btn-primary py-3 px-5 rounded-pill text-white fw-bold">Jelajahi Menu Kami <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Services Start -->
<div class="container-fluid service py-6 bg-light" id="services-section">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Layanan Kami</small>
            <h1 class="display-5 mb-5" style="font-family: 'Playball', cursive;">Solusi Katering Acara Spesial Anda</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="0.1s">
                <div class="bg-white rounded p-4 text-center h-100 shadow-sm border">
                    <div class="btn-primary d-inline-flex align-items-center justify-content-center rounded-circle mb-4" style="width: 75px; height: 75px;">
                        <i class="fas fa-glass-cheers fa-2x text-white"></i>
                    </div>
                    <h4 class="mb-3">Wedding & Resepsi</h4>
                    <p class="text-muted mb-0">Paket prasmanan mewah lengkap dengan dekorasi meja stall, hidangan pembuka, lauk utama, hingga dessert lezat.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="0.3s">
                <div class="bg-white rounded p-4 text-center h-100 shadow-sm border">
                    <div class="btn-primary d-inline-flex align-items-center justify-content-center rounded-circle mb-4" style="width: 75px; height: 75px;">
                        <i class="fas fa-briefcase fa-2x text-white"></i>
                    </div>
                    <h4 class="mb-3">Corporate & Gathering</h4>
                    <p class="text-muted mb-0">Layanan catering rapat harian, seminar kampus, dan gathering kantor dengan opsi buffet maupun meal-box higienis.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="0.5s">
                <div class="bg-white rounded p-4 text-center h-100 shadow-sm border">
                    <div class="btn-primary d-inline-flex align-items-center justify-content-center rounded-circle mb-4" style="width: 75px; height: 75px;">
                        <i class="fas fa-box fa-2x text-white"></i>
                    </div>
                    <h4 class="mb-3">Nasi Box & Bento</h4>
                    <p class="text-muted mb-0">Praktis, bersih, dan higienis. Dikemas dalam box elegan dengan porsi mengenyangkan dan variasi lauk seimbang.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->

<!-- Events Start -->
<div class="container-fluid event py-6" id="events-section">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Dokumentasi Acara</small>
            <h1 class="display-5 mb-5" style="font-family: 'Playball', cursive;">Momen Berkesan Bersama Nala Catering</h1>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                <div class="event-img position-relative overflow-hidden rounded shadow-sm">
                    <img class="img-fluid rounded w-100" src="{{ asset('assets-guest/img/event-1.jpg') }}" alt="Event Catering 1" style="height: 220px; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.2s">
                <div class="event-img position-relative overflow-hidden rounded shadow-sm">
                    <img class="img-fluid rounded w-100" src="{{ asset('assets-guest/img/event-2.jpg') }}" alt="Event Catering 2" style="height: 220px; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                <div class="event-img position-relative overflow-hidden rounded shadow-sm">
                    <img class="img-fluid rounded w-100" src="{{ asset('assets-guest/img/event-3.jpg') }}" alt="Event Catering 3" style="height: 220px; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.4s">
                <div class="event-img position-relative overflow-hidden rounded shadow-sm">
                    <img class="img-fluid rounded w-100" src="{{ asset('assets-guest/img/event-4.jpg') }}" alt="Event Catering 4" style="height: 220px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Events End -->

<!-- Menu Start -->
<div class="container-fluid menu py-6 bg-light" id="menu-section">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Pilihan Sajian Istimewa</small>
            <h1 class="display-5 mb-3" style="font-family: 'Playball', cursive;">Katalog Menu Nala Catering</h1>
            <p class="text-muted mx-auto mb-4" style="max-width: 650px;">
                Temukan beragam pilihan masakan lezat dari dapur kami. Pilih menu yang Anda inginkan dan klik <strong>Pesan Menu</strong> untuk memesan langsung secara online.
            </p>
        </div>

        <!-- Search Box & Filter Category -->
        <div class="row justify-content-center mb-5 wow bounceInUp" data-wow-delay="0.2s">
            <div class="col-lg-8">
                <!-- Search Form -->
                <form action="{{ route('guest.menu') }}#menu-section" method="GET" class="mb-4">
                    <div class="input-group shadow-sm">
                        <input type="text" name="q" value="{{ request('q') }}" class="form-control form-control-lg bg-white border-primary" placeholder="Cari sajian (misal: Rendang, Ayam Bakar, Tumpeng, Sate...)" style="border-radius: 50px 0 0 50px; padding-left: 25px;">
                        <button type="submit" class="btn btn-primary text-white fw-bold px-4" style="border-radius: 0 50px 50px 0;">
                            <i class="fas fa-search me-1"></i> Cari
                        </button>
                    </div>
                    @if(request('kategori') && request('kategori') !== 'all')
                        <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                    @endif
                </form>

                <!-- Category Filter Buttons -->
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    @foreach($categories as $label => $val)
                        <a href="{{ route('guest.menu', array_merge(request()->except('page'), ['kategori' => $val])) }}#menu-section"
                           class="menu-filter-btn {{ $selectedCategory == $val ? 'active' : '' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Menu Grid -->
        <div class="row g-4">
            @forelse($menus as $menu)
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="menu-card p-3 p-md-4">
                        <div class="d-flex align-items-start gap-3">
                            <!-- Foto Menu -->
                            <div class="flex-shrink-0">
                                <img src="{{ $menu->foto_url }}" alt="{{ $menu->nama_menu }}"
                                     class="rounded-3 shadow-sm border"
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            </div>
                            <!-- Detail Menu -->
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-1">
                                    <div>
                                        <span class="badge bg-light text-primary border border-primary px-2 py-1 rounded-pill" style="font-size: 11px;">
                                            {{ $menu->kategori }}
                                        </span>
                                        <h4 class="mb-0 mt-1 fw-bold text-dark" style="font-size: 18px;">{{ $menu->nama_menu }}</h4>
                                    </div>
                                    <div class="text-primary fw-bold fs-5 text-nowrap ms-2" style="font-family: 'Open Sans', sans-serif;">
                                        {{ $menu->formatted_harga }}
                                    </div>
                                </div>
                                <p class="text-muted small mb-3 lh-base">
                                    {{ Str::limit($menu->deskripsi ?? 'Sajian istimewa dari dapur Nala Catering dengan bumbu rempah pilihan bermutu tinggi.', 85) }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                                    <span class="text-muted small">
                                        <i class="fas fa-users text-primary me-1"></i> Min: <strong>{{ $menu->minimal_porsi }} Porsi</strong>
                                    </span>
                                    <button type="button" 
                                            class="btn btn-primary btn-sm rounded-pill px-3 py-1 text-white fw-bold shadow-sm btn-order-menu"
                                            data-id="{{ $menu->id }}"
                                            data-name="{{ $menu->nama_menu }}"
                                            data-price="{{ $menu->harga }}"
                                            data-formatted="{{ $menu->formatted_harga }}"
                                            data-min="{{ $menu->minimal_porsi }}"
                                            data-img="{{ $menu->foto_url }}"
                                            onclick="openOrderModal('{{ $menu->id }}', '{{ addslashes($menu->nama_menu) }}', '{{ $menu->harga }}', '{{ $menu->formatted_harga }}', '{{ $menu->minimal_porsi }}', '{{ $menu->foto_url }}')">
                                        <i class="fas fa-shopping-basket me-1"></i> Pesan Menu
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="bg-white p-5 rounded-4 shadow-sm mx-auto" style="max-width: 500px;">
                        <i class="fas fa-utensils fa-3x text-primary mb-3"></i>
                        <h4 class="text-dark">Tidak Ada Menu Ditemukan</h4>
                        <p class="text-muted">Maaf, sajian yang Anda cari belum tersedia dalam kategori atau kata kunci ini.</p>
                        <a href="{{ route('guest.menu') }}#menu-section" class="btn btn-primary rounded-pill px-4 text-white fw-bold">
                            Tampilkan Semua Menu
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Menu End -->

@if(isset($pakets) && $pakets->count() > 0)
<!-- Paket Catering Start -->
<div class="container-fluid py-6" id="paketcatering-section">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Paket Lengkap Hemat</small>
            <h1 class="display-5 mb-5" style="font-family: 'Playball', cursive;">Paket Prasmanan & Acara Favorit</h1>
        </div>
        <div class="row g-4">
            @foreach($pakets as $p)
                <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.2s">
                    <div class="bg-white rounded-4 border overflow-hidden shadow-sm h-100 d-flex flex-column">
                        <div class="position-relative" style="height: 190px;">
                            <img src="{{ $p->foto_url }}" alt="{{ $p->nama_paket }}" class="w-100 h-100" style="object-fit: cover;">
                            <span class="position-absolute top-0 start-0 m-3 badge bg-primary text-white rounded-pill px-3 py-1">
                                {{ $p->jenis_paket }}
                            </span>
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h4 class="mb-2 fw-bold text-dark fs-5">{{ $p->nama_paket }}</h4>
                            <div class="text-primary fw-bold fs-5 mb-2">
                                {{ $p->formatted_harga }}
                                <small class="text-muted fw-normal fs-6">/ porsi</small>
                            </div>
                            <p class="text-muted small mb-3 flex-grow-1">
                                {{ Str::limit($p->deskripsi, 90) }}
                            </p>
                            @if($p->fasilitas)
                                <div class="bg-light p-2 rounded-3 small text-primary mb-3">
                                    <i class="fas fa-check-circle me-1"></i> {{ Str::limit($p->fasilitas, 50) }}
                                </div>
                            @endif
                            <button type="button" 
                                    class="btn btn-primary rounded-pill w-100 text-white fw-bold py-2 shadow-sm btn-order-menu"
                                    data-id="{{ $p->id }}"
                                    data-name="{{ $p->nama_paket }}"
                                    data-price="{{ $p->harga_paket }}"
                                    data-formatted="{{ $p->formatted_harga }}"
                                    data-min="{{ $p->minimal_porsi }}"
                                    data-img="{{ $p->foto_url }}"
                                    onclick="openOrderModal('{{ $p->id }}', '{{ addslashes($p->nama_paket) }}', '{{ $p->harga_paket }}', '{{ $p->formatted_harga }}', '{{ $p->minimal_porsi }}', '{{ $p->foto_url }}')">
                                <i class="fas fa-shopping-cart me-1"></i> Pesan Paket Ini
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Paket Catering End -->
@endif

<!-- Booking CTA Start -->
<div class="container-fluid book-us py-6 my-6 bg-light" id="booking-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Pesan Sekarang</small>
                <h1 class="display-5 mb-4" style="font-family: 'Playball', cursive;">Ingin Konsultasi Menu Acara Anda?</h1>
                <p class="text-muted mb-4 lh-lg">
                    Hubungi tim Nala Catering sekarang untuk mendapatkan penawaran spesial, penyesuaian porsi prasmanan, konsultasi menu diet tertentu, atau test food sebelum hari H acara Anda.
                </p>
                <div class="d-flex align-items-center mb-4">
                    <div class="btn-primary d-inline-flex align-items-center justify-content-center rounded-circle me-3" style="width: 55px; height: 55px;">
                        <i class="fas fa-phone-alt fa-lg text-white"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted">WhatsApp / Call Hotline</h6>
                        <h4 class="mb-0 text-primary fw-bold">+62 812-3456-7890</h4>
                    </div>
                </div>
                <a href="#menu-section" class="btn btn-primary rounded-pill py-3 px-5 text-white fw-bold shadow-sm">
                    <i class="fas fa-utensils me-2"></i> Pilih & Pesan Menu Sekarang
                </a>
            </div>
            <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                <div class="bg-white rounded-4 p-5 shadow-sm border text-center">
                    <img src="{{ asset('assets-guest/img/nala-logo.png') }}" alt="Nala Catering" class="mb-3" style="max-height: 90px;">
                    <h3 class="mb-2" style="font-family: 'Playball', cursive;">Nala Catering & Food</h3>
                    <p class="text-muted mb-4">Kepercayaan dan kelezatan hidangan untuk seluruh keluarga dan relasi Anda.</p>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="border rounded-3 p-3 bg-light">
                                <h3 class="text-primary mb-0 fw-bold">500+</h3>
                                <small class="text-muted">Acara Sukses</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border rounded-3 p-3 bg-light">
                                <h3 class="text-primary mb-0 fw-bold">100%</h3>
                                <small class="text-muted">Bahan Segar & Halal</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking CTA End -->

@endsection

@section('modals')
<!-- MODAL FORM PEMESANAN CATERING (BOOTSTRAP 5) -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
            <div class="modal-header bg-primary text-white py-3 px-4 border-0">
                <h5 class="modal-title fw-bold text-white d-flex align-items-center" id="orderModalLabel">
                    <i class="fas fa-shopping-basket me-2"></i> Formulir Pemesanan Nala Catering
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('guest.order') }}" method="POST" id="orderForm">
                @csrf
                <input type="hidden" name="menu_id" id="modalMenuId">
                <input type="hidden" name="nama_menu" id="modalMenuNameInput">
                <input type="hidden" name="harga_satuan" id="modalMenuPriceInput">

                <div class="modal-body p-4">
                    <!-- Ringkasan Menu Terpilih -->
                    <div class="d-flex gap-3 align-items-center p-3 mb-4 rounded-3 border bg-light">
                        <img id="modalMenuImg" src="" alt="Menu" class="rounded-3 border shadow-sm" style="width: 75px; height: 75px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-1 text-dark" id="modalMenuName">Nama Menu</h5>
                            <div class="text-primary fw-bold fs-5" id="modalMenuPrice">Rp 0</div>
                            <small class="text-muted" id="modalMenuMinPortion">Min. 1 Porsi</small>
                        </div>
                    </div>

                    <!-- Input Data Pemesan -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Nama Lengkap Pemesan <span class="text-danger">*</span></label>
                            <input type="text" name="nama_pemesan" class="form-control" placeholder="Contoh: Budi Santoso" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">No. WhatsApp / HP <span class="text-danger">*</span></label>
                            <input type="text" name="no_hp" class="form-control" placeholder="081234567890" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Email (Opsional)</label>
                            <input type="email" name="email" class="form-control" placeholder="nama@email.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Jumlah Porsi / Box <span class="text-danger">*</span></label>
                            <input type="number" name="jumlah_porsi" id="modalPortionInput" class="form-control" min="1" value="1" required oninput="calcTotal()">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Tanggal Acara</label>
                            <input type="date" name="tanggal_acara" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Jenis Acara</label>
                            <select name="jenis_acara" class="form-select">
                                <option value="Prasmanan Pernikahan">Prasmanan Pernikahan / Wedding</option>
                                <option value="Rapat / Kantor">Rapat / Gathering Kantor</option>
                                <option value="Syukuran / Khitanan">Syukuran / Khitanan</option>
                                <option value="Ulang Tahun">Pesta Ulang Tahun</option>
                                <option value="Arisan / Keluarga">Arisan Keluarga</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold text-dark small">Alamat Pengantaran / Lokasi Acara</label>
                            <textarea name="alamat" rows="2" class="form-control" placeholder="Alamat lengkap tujuan pengantaran..."></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold text-dark small">Catatan Tambahan (Opsional)</label>
                            <input type="text" name="catatan" class="form-control" placeholder="Contoh: Sambal dipisah, packaging ramah lingkungan...">
                        </div>
                    </div>

                    <!-- Total Estimasi -->
                    <div class="d-flex justify-content-between align-items-center mt-4 p-3 bg-light rounded-3 border">
                        <span class="fw-semibold text-muted">Estimasi Total Biaya:</span>
                        <span class="fs-4 fw-bold text-primary" id="modalTotalPrice">Rp 0</span>
                    </div>
                </div>

                <div class="modal-footer bg-light px-4 py-3 border-top">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary text-white fw-bold rounded-pill px-4 shadow-sm">
                        <i class="fas fa-check me-1"></i> Kirim Pesanan Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL BUKTI PEMESANAN / INVOICE SUKSES -->
@php
    $p = session('pesanan');
@endphp
@if(session('order_success') && $p)
    @php
        $kodePesanan = data_get($p, 'kode_pesanan');
        $namaPemesan = data_get($p, 'nama_pemesan');
        $noHp = data_get($p, 'no_hp');
        $namaMenu = data_get($p, 'nama_menu');
        $jumlahPorsi = data_get($p, 'jumlah_porsi');
        $tanggalAcara = data_get($p, 'tanggal_acara');
        $totalHarga = data_get($p, 'total_harga', 0);
        $formattedTotal = is_object($p) && isset($p->formatted_total) ? $p->formatted_total : 'Rp ' . number_format($totalHarga, 0, ',', '.');
    @endphp
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
                <div class="modal-header bg-success text-white text-center py-4 px-3 flex-column border-0 position-relative">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="rounded-circle bg-white text-success d-inline-flex align-items-center justify-content-center mb-2" style="width: 60px; height: 60px;">
                        <i class="fas fa-check fa-2x"></i>
                    </div>
                    <h4 class="modal-title fw-bold text-white mb-0" id="successModalLabel">Pesanan Berhasil Dikirim!</h4>
                    <p class="small text-white-50 mb-0">Pesanan Anda telah resmi dicatat dalam sistem Nala Catering.</p>
                </div>

                <div class="modal-body p-4">
                    <div class="text-center pb-3 mb-3 border-bottom border-dashed">
                        <div class="text-muted small text-uppercase fw-semibold">Kode Pesanan</div>
                        <div class="fs-3 fw-bold text-primary">#{{ $kodePesanan }}</div>
                        <span class="badge bg-warning text-dark px-3 py-1 rounded-pill mt-1">Status: Menunggu Konfirmasi</span>
                    </div>

                    <table class="table table-borderless small mb-3">
                        <tr>
                            <td class="text-muted">Nama Pemesan</td>
                            <td class="fw-semibold text-dark text-end">{{ $namaPemesan }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">No. Handphone</td>
                            <td class="fw-semibold text-dark text-end">{{ $noHp }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Menu Pilihan</td>
                            <td class="fw-semibold text-dark text-end">{{ $namaMenu }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Jumlah Porsi</td>
                            <td class="fw-semibold text-dark text-end">{{ $jumlahPorsi }} Porsi / Box</td>
                        </tr>
                        @if($tanggalAcara)
                        <tr>
                            <td class="text-muted">Tanggal Acara</td>
                            <td class="fw-semibold text-dark text-end">{{ date('d F Y', strtotime($tanggalAcara)) }}</td>
                        </tr>
                        @endif
                        <tr class="border-top">
                            <td class="fw-bold fs-6 text-dark pt-2">Total Biaya</td>
                            <td class="fw-bold fs-5 text-primary text-end pt-2">{{ $formattedTotal }}</td>
                        </tr>
                    </table>

                    <div class="p-3 bg-light rounded-3 text-muted small">
                        <i class="fas fa-info-circle text-primary me-1"></i> Tim admin kami akan segera menghubungi nomor Anda untuk konfirmasi rincian pengantaran dan pembayaran.
                    </div>
                </div>

                <div class="modal-footer bg-light px-4 py-3 border-top justify-content-center gap-2">
                    <a href="{{ route('guest.nota', $kodePesanan) }}" class="btn btn-primary rounded-pill px-4 text-white fw-bold">
                        <i class="fas fa-file-invoice me-1"></i> Buka & Cetak Nota Resmi
                    </a>
                    @php
                        $waConfirm = urlencode("Halo Nala Catering, saya telah melakukan pemesanan melalui website dengan Kode Pesanan: #" . $kodePesanan . " (" . $namaMenu . " - " . $jumlahPorsi . " porsi). Mohon konfirmasinya.");
                    @endphp
                    <a href="https://api.whatsapp.com/send?phone=6281234567890&text={{ $waConfirm }}" target="_blank"
                       class="btn btn-success rounded-pill px-4 text-white fw-bold">
                        <i class="fab fa-whatsapp me-1"></i> WhatsApp
                    </a>
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection

@section('scripts')
<script>
    let currentItemPrice = 0;

    function openOrderModal(id, name, price, formattedPrice, minPortion, imgUrl) {
        currentItemPrice = parseFloat(price) || 0;
        
        if (document.getElementById('modalMenuId')) document.getElementById('modalMenuId').value = id || '';
        if (document.getElementById('modalMenuPriceInput')) document.getElementById('modalMenuPriceInput').value = currentItemPrice;
        if (document.getElementById('modalMenuNameInput')) document.getElementById('modalMenuNameInput').value = name || '';
        if (document.getElementById('modalMenuName')) document.getElementById('modalMenuName').innerText = name || '';
        if (document.getElementById('modalMenuPrice')) document.getElementById('modalMenuPrice').innerText = formattedPrice || ('Rp ' + currentItemPrice.toLocaleString('id-ID'));
        if (document.getElementById('modalMenuMinPortion')) document.getElementById('modalMenuMinPortion').innerText = 'Minimal Order: ' + (minPortion || 1) + ' Porsi';
        if (document.getElementById('modalMenuImg')) document.getElementById('modalMenuImg').src = imgUrl || '{{ asset("assets-guest/img/hero.png") }}';

        const portionInput = document.getElementById('modalPortionInput');
        if (portionInput) {
            const minVal = parseInt(minPortion) || 1;
            portionInput.min = minVal;
            portionInput.value = minVal;
        }

        calcTotal();

        // Show Bootstrap 5 modal safely
        const modalElement = document.getElementById('orderModal');
        if (modalElement) {
            if (window.bootstrap && bootstrap.Modal) {
                let modalInstance;
                if (typeof bootstrap.Modal.getOrCreateInstance === 'function') {
                    modalInstance = bootstrap.Modal.getOrCreateInstance(modalElement);
                } else {
                    modalInstance = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                }
                modalInstance.show();
            } else if (window.jQuery) {
                $(modalElement).modal('show');
            }
        }
    }

    function calcTotal() {
        const portionInput = document.getElementById('modalPortionInput');
        const portion = portionInput ? (parseInt(portionInput.value) || 0) : 1;
        const total = portion * currentItemPrice;
        const totalEl = document.getElementById('modalTotalPrice');
        if (totalEl) {
            totalEl.innerText = 'Rp ' + total.toLocaleString('id-ID');
        }
    }

    // Attach click listener & auto-show success modal
    document.addEventListener("DOMContentLoaded", function () {
        document.addEventListener("click", function(e) {
            const btn = e.target.closest('.btn-order-menu');
            if (btn) {
                const id = btn.getAttribute('data-id');
                const name = btn.getAttribute('data-name');
                const price = btn.getAttribute('data-price');
                const formatted = btn.getAttribute('data-formatted');
                const min = btn.getAttribute('data-min');
                const img = btn.getAttribute('data-img');
                openOrderModal(id, name, price, formatted, min, img);
            }
        });

        @if(session('order_success'))
            const successEl = document.getElementById('successModal');
            if (successEl) {
                if (window.bootstrap && bootstrap.Modal) {
                    const successModal = (typeof bootstrap.Modal.getOrCreateInstance === 'function')
                        ? bootstrap.Modal.getOrCreateInstance(successEl)
                        : (bootstrap.Modal.getInstance(successEl) || new bootstrap.Modal(successEl));
                    successModal.show();
                } else if (window.jQuery) {
                    $(successEl).modal('show');
                }
            }
        @endif
    });
</script>
@endsection
