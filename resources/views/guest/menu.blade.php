@extends('guest')

@section('title', 'Katalog Menu Catering - Nala Catering')

@section('content')
<!-- ABOUT & HIGHLIGHT SECTION -->
<div id="fh5co-about" data-section="about" style="padding: 60px 0; background: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 to-animate-2">
                <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    <img src="{{ asset('assets-guest/images/res_img_1.jpg') }}" class="img-responsive" alt="Nala Catering Kitchen" style="width: 100%; height: auto;">
                </div>
            </div>
            <div class="col-md-6 to-animate" style="padding-top: 20px;">
                <span class="badge-cat">Tentang Nala Catering</span>
                <h2 style="font-family: 'Playfair Display', serif; font-size: 32px; color: #222; margin-top: 5px; margin-bottom: 20px;">
                    Citarasa Tradisional & Modern Dengan Kualitas Terbaik
                </h2>
                <p style="color: #666; line-height: 1.8;">
                    Nala Catering berkomitmen menyajikan aneka sajian kuliner istimewa dengan bahan baku segar, resep bumbu otentik, dan higienitas tinggi. Apapun acara Anda—pernikahan, khitanan, gathering kantor, arisan keluarga, hingga tumpengan syukuran—kami siap menjadi mitra terbaik Anda.
                </p>
                <div class="row" style="margin-top: 25px;">
                    <div class="col-xs-6">
                        <h4 style="color: #fb6e14; font-weight: 700; font-size: 24px; margin-bottom: 5px;">100% Halal</h4>
                        <p style="font-size: 14px; color: #777;">Higienis & Bersertifikat</p>
                    </div>
                    <div class="col-xs-6">
                        <h4 style="color: #fb6e14; font-weight: 700; font-size: 24px; margin-bottom: 5px;">Tepat Waktu</h4>
                        <p style="font-size: 14px; color: #777;">Pengiriman Sigap & Aman</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MENUS SECTION -->
<div id="fh5co-menus" data-section="menu" style="background: #fbf9f7; padding: 70px 0;">
    <div class="container">
        <div class="row text-center fh5co-heading" style="margin-bottom: 35px;">
            <div class="col-md-8 col-md-offset-2">
                <span class="badge-cat">Pilihan Istimewa</span>
                <h2 class="heading to-animate" style="margin-top: 5px; font-size: 36px;">Menu Sajian Catering</h2>
                <p class="sub-heading to-animate" style="color: #777;">
                    Temukan beragam paket menu prasmanan, hidangan utama, hidangan pembuka, aneka dessert, hingga snack box lezat untuk kebutuhan acara Anda.
                </p>
            </div>
        </div>

        <!-- SEARCH & CATEGORY FILTER -->
        <div class="row" style="margin-bottom: 35px;">
            <div class="col-md-12 text-center">
                <!-- Search Box -->
                <form action="{{ route('guest.menu') }}" method="GET" class="form-inline" style="margin-bottom: 25px;">
                    <div class="form-group" style="width: 100%; max-width: 480px; margin: 0 auto;">
                        <div class="input-group" style="width: 100%;">
                            <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari sajian (misal: Rendang, Tumpeng, Ayam...)" style="height: 48px; border-radius: 25px 0 0 25px; border: 1px solid #ddd; padding-left: 20px;">
                            <span class="input-group-btn">
                                <button type="submit" class="btn" style="height: 48px; border-radius: 0 25px 25px 0; background: #fb6e14; color: #fff; padding: 0 25px; font-weight: 600;">
                                    <i class="icon-magnifier"></i> Cari
                                </button>
                            </span>
                        </div>
                    </div>
                    @if(request('kategori') && request('kategori') !== 'all')
                        <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                    @endif
                </form>

                <!-- Category Pills -->
                <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 8px;">
                    @foreach($categories as $label => $val)
                        <a href="{{ route('guest.menu', array_merge(request()->except('page'), ['kategori' => $val])) }}"
                           class="menu-filter-btn {{ $selectedCategory == $val ? 'active' : '' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- MENU ITEMS DISPLAY -->
        <div class="row">
            @forelse($menus as $menu)
                <div class="col-md-6 col-sm-12" style="margin-bottom: 30px;">
                    <div style="background: #ffffff; border-radius: 12px; padding: 22px; box-shadow: 0 4px 15px rgba(0,0,0,0.04); display: flex; gap: 18px; align-items: flex-start; border: 1px solid #f0e9e4; transition: all 0.3s; position: relative;">
                        <!-- Menu Image -->
                        <div style="flex-shrink: 0;">
                            <img src="{{ $menu->foto_url }}" alt="{{ $menu->nama_menu }}" 
                                 style="width: 110px; height: 110px; object-fit: cover; border-radius: 10px; border: 1px solid #eae2db;">
                        </div>

                        <!-- Menu Details -->
                        <div style="flex-grow: 1;">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 10px;">
                                <div>
                                    <span class="badge-cat" style="font-size: 10px; padding: 2px 8px;">{{ $menu->kategori }}</span>
                                    <h3 style="font-family: 'Playfair Display', serif; font-size: 19px; color: #222; margin: 2px 0 6px 0; font-weight: 700;">
                                        {{ $menu->nama_menu }}
                                    </h3>
                                </div>
                                <div class="fh5co-food-pricing" style="font-size: 18px; white-space: nowrap;">
                                    {{ $menu->formatted_harga }}
                                </div>
                            </div>

                            <p style="font-size: 13px; color: #777; line-height: 1.6; margin-bottom: 12px;">
                                {{ $menu->deskripsi ?? 'Sajian istimewa dari dapur Nala Catering dengan racikan rempah terpilih.' }}
                            </p>

                            <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px dashed #eee; padding-top: 10px;">
                                <span style="font-size: 12px; color: #888;">
                                    <i class="icon-user"></i> Min. Order: <strong>{{ $menu->minimal_porsi }} Porsi</strong>
                                </span>

                                <!-- Form Pemesanan Internal di Website -->
                                <button type="button" class="btn-primary-catering" style="padding: 6px 16px; font-size: 12px; border-radius: 20px; border: none; cursor: pointer;"
                                        onclick="openOrderModal('{{ $menu->id }}', '{{ addslashes($menu->nama_menu) }}', '{{ $menu->harga }}', '{{ $menu->formatted_harga }}', '{{ $menu->minimal_porsi }}', '{{ $menu->foto_url }}')">
                                    <i class="icon-basket"></i> Pesan Menu
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center" style="padding: 60px 0;">
                    <div style="background: #fff; padding: 40px; border-radius: 12px; max-width: 500px; margin: 0 auto; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                        <i class="icon-cup" style="font-size: 48px; color: #fb6e14;"></i>
                        <h4 style="margin-top: 15px; color: #333;">Tidak Ada Menu Ditemukan</h4>
                        <p style="color: #777; font-size: 14px;">Maaf, tidak ada sajian yang sesuai dengan filter atau kata kunci Anda.</p>
                        <a href="{{ route('guest.menu') }}" class="btn-primary-catering" style="padding: 8px 20px; font-size: 13px;">
                            Lihat Semua Menu
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- FEATURES SECTION -->
<div id="fh5co-features" data-section="features" style="padding: 70px 0; background: #fff;">
    <div class="container">
        <div class="row text-center fh5co-heading">
            <div class="col-md-8 col-md-offset-2">
                <span class="badge-cat">Kenapa Memilih Kami?</span>
                <h2 class="heading to-animate" style="font-size: 32px; margin-top: 5px;">Keunggulan Nala Catering</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center to-animate" style="margin-bottom: 30px;">
                <div style="background: #fbf9f7; padding: 30px 20px; border-radius: 12px; border: 1px solid #f0e9e4; height: 100%;">
                    <div style="width: 70px; height: 70px; margin: 0 auto 15px auto; border-radius: 50%; background: #fef0e7; display: flex; align-items: center; justify-content: center;">
                        <i class="icon-badge" style="font-size: 28px; color: #fb6e14;"></i>
                    </div>
                    <h3 style="font-size: 20px; color: #222; margin-bottom: 10px;">Bahan Premium & Segar</h3>
                    <p style="font-size: 14px; color: #777; line-height: 1.7;">Semua bahan masakan dipilih langsung dari produsen terpercaya demi menjaga kesegaran dan kemurnian rasa.</p>
                </div>
            </div>

            <div class="col-md-4 text-center to-animate" style="margin-bottom: 30px;">
                <div style="background: #fbf9f7; padding: 30px 20px; border-radius: 12px; border: 1px solid #f0e9e4; height: 100%;">
                    <div style="width: 70px; height: 70px; margin: 0 auto 15px auto; border-radius: 50%; background: #fef0e7; display: flex; align-items: center; justify-content: center;">
                        <i class="icon-clock" style="font-size: 28px; color: #fb6e14;"></i>
                    </div>
                    <h3 style="font-size: 20px; color: #222; margin-bottom: 10px;">Pengiriman Tepat Waktu</h3>
                    <p style="font-size: 14px; color: #777; line-height: 1.7;">Tim logistik kami terlatih mengantarkan pesanan hidangan Anda tepat waktu sesuai jadwal sebelum acara dimulai.</p>
                </div>
            </div>

            <div class="col-md-4 text-center to-animate" style="margin-bottom: 30px;">
                <div style="background: #fbf9f7; padding: 30px 20px; border-radius: 12px; border: 1px solid #f0e9e4; height: 100%;">
                    <div style="width: 70px; height: 70px; margin: 0 auto 15px auto; border-radius: 50%; background: #fef0e7; display: flex; align-items: center; justify-content: center;">
                        <i class="icon-heart" style="font-size: 28px; color: #fb6e14;"></i>
                    </div>
                    <h3 style="font-size: 20px; color: #222; margin-bottom: 10px;">Kustomisasi Bebas</h3>
                    <p style="font-size: 14px; color: #777; line-height: 1.7;">Anda dapat mengkombinasikan lauk, varian nasi, minuman, dan kemasan sesuai anggaran dan tema kegiatan Anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@if(isset($pakets) && $pakets->count() > 0)
<!-- SECTION PAKET CATERING MASTER -->
<div id="fh5co-featured" style="padding: 70px 0; background: #fff;">
    <div class="container">
        <div class="row text-center fh5co-heading" style="margin-bottom: 35px;">
            <div class="col-md-8 col-md-offset-2">
                <span class="badge-cat">Paket Lengkap Praktis</span>
                <h2 class="heading" style="margin-top: 5px; font-size: 34px;">Paket Catering Pilihan</h2>
                <p class="sub-heading" style="color: #777;">
                    Solusi hemat dan praktis untuk prasmanan pernikahan, nasi box kantor, tumpeng syukuran, dan coffee break.
                </p>
            </div>
        </div>

        <div class="row">
            @foreach($pakets as $p)
                <div class="col-md-6 col-lg-3" style="margin-bottom: 30px;">
                    <div style="background: #fff; border-radius: 12px; border: 1px solid #eee; box-shadow: 0 4px 15px rgba(0,0,0,0.05); overflow: hidden; height: 100%; display: flex; flex-direction: column;">
                        <div style="position: relative; height: 180px; overflow: hidden;">
                            <img src="{{ $p->foto_url }}" alt="{{ $p->nama_paket }}" style="width: 100%; height: 100%; object-fit: cover;">
                            <span style="position: absolute; top: 12px; left: 12px; background: rgba(0,0,0,0.7); color: #fff; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600;">
                                {{ $p->jenis_paket }}
                            </span>
                        </div>
                        <div style="padding: 20px; flex: 1; display: flex; flex-direction: column;">
                            <h4 style="font-size: 17px; font-weight: 700; color: #222; margin-top: 0; margin-bottom: 8px;">
                                {{ $p->nama_paket }}
                            </h4>
                            <div style="color: #fb6e14; font-size: 18px; font-weight: 700; margin-bottom: 10px;">
                                {{ $p->formatted_harga }}
                                <small style="font-size: 12px; color: #888; font-weight: normal;">/ porsi</small>
                            </div>
                            <p style="font-size: 13px; color: #666; line-height: 1.6; flex: 1; margin-bottom: 15px;">
                                {{ Str::limit($p->deskripsi, 90) }}
                            </p>
                            @if($p->fasilitas)
                                <div style="background: #fdf5ef; padding: 8px 10px; border-radius: 6px; font-size: 11px; color: #c05309; margin-bottom: 15px;">
                                    <i class="icon-check"></i> {{ Str::limit($p->fasilitas, 50) }}
                                </div>
                            @endif
                            <button type="button" 
                                    class="btn-primary-catering" 
                                    style="width: 100%; text-align: center; border: none; padding: 10px 0; font-size: 13px;"
                                    onclick="openOrderModal('{{ $p->id }}', '{{ addslashes($p->nama_paket) }}', '{{ $p->harga_paket }}', '{{ $p->minimal_porsi }}', '{{ $p->foto_url }}')">
                                <i class="icon-basket"></i> Pesan Paket Ini
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- CALL TO ACTION / RESERVASI -->
<div id="fh5co-contact" data-section="reservation" style="background: url('{{ asset('assets-guest/images/slide_2.jpg') }}') center center no-repeat; background-size: cover; position: relative; padding: 80px 0;">
    <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.7);"></div>
    <div class="container" style="position: relative; z-index: 2;">
        <div class="row text-center">
            <div class="col-md-8 col-md-offset-2" style="color: #fff;">
                <h2 style="font-family: 'Playfair Display', serif; color: #fff; font-size: 36px; margin-bottom: 15px;">
                    Konsultasi & Reservasi Acara Spesial
                </h2>
                <p style="font-size: 16px; color: #ddd; margin-bottom: 30px;">
                    Pilih menu favorit Anda di atas dan pesan langsung melalui sistem kami secara online dengan cepat dan praktis.
                </p>
                <a href="#fh5co-menus" class="btn-primary-catering" style="font-size: 15px; padding: 14px 35px; text-decoration: none;">
                    <i class="icon-book-open"></i> Pilih Menu Catering Sekarang
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modals')
<!-- MODAL FORM PEMESANAN INTERNAL (BOOTSTRAP MODAL) -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="border-radius: 12px; overflow: hidden; border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.2);">
            <div class="modal-header" style="background: #fb6e14; color: #fff; padding: 18px 24px; border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff; opacity: 0.9; font-size: 24px;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="orderModalLabel" style="font-weight: 700; color: #fff; font-size: 18px;">
                    <i class="icon-basket" style="margin-right: 8px;"></i> Formulir Pemesanan Catering
                </h4>
            </div>

            <form action="{{ route('guest.order') }}" method="POST" id="orderForm">
                @csrf
                <input type="hidden" name="menu_id" id="modalMenuId">
                <input type="hidden" name="nama_menu" id="modalMenuNameInput">

                <div class="modal-body" style="padding: 24px;">
                    <!-- Ringkasan Menu Terpilih -->
                    <div style="background: #fdf5ef; border: 1px solid #fbd9c4; border-radius: 8px; padding: 14px; display: flex; gap: 14px; align-items: center; margin-bottom: 20px;">
                        <img id="modalMenuImg" src="" alt="Menu" style="width: 65px; height: 65px; object-fit: cover; border-radius: 8px;">
                        <div>
                            <div style="font-weight: 700; font-size: 16px; color: #222;" id="modalMenuName">Nama Menu</div>
                            <div style="color: #fb6e14; font-weight: 700; font-size: 15px;" id="modalMenuPrice">Rp 0</div>
                            <small style="color: #777;" id="modalMenuMinPortion">Min. 1 Porsi</small>
                        </div>
                    </div>

                    <!-- Input Data Pemesan -->
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label style="font-size: 13px; font-weight: 600; color: #333;">Nama Lengkap Pemesan <span style="color: red;">*</span></label>
                        <input type="text" name="nama_pemesan" class="form-control" placeholder="Contoh: Budi Santoso" required style="border-radius: 6px;">
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label style="font-size: 13px; font-weight: 600; color: #333;">No. HP / WhatsApp <span style="color: red;">*</span></label>
                                <input type="text" name="no_hp" class="form-control" placeholder="081234567890" required style="border-radius: 6px;">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label style="font-size: 13px; font-weight: 600; color: #333;">Email (Opsional)</label>
                                <input type="email" name="email" class="form-control" placeholder="nama@email.com" style="border-radius: 6px;">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label style="font-size: 13px; font-weight: 600; color: #333;">Jumlah Porsi <span style="color: red;">*</span></label>
                                <input type="number" name="jumlah_porsi" id="modalPortionInput" class="form-control" min="1" value="1" required style="border-radius: 6px;" oninput="calcTotal()">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label style="font-size: 13px; font-weight: 600; color: #333;">Tanggal Acara</label>
                                <input type="date" name="tanggal_acara" class="form-control" style="border-radius: 6px;">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 15px;">
                        <label style="font-size: 13px; font-weight: 600; color: #333;">Jenis Acara / Keperluan</label>
                        <select name="jenis_acara" class="form-control" style="border-radius: 6px;">
                            <option value="Prasmanan Pernikahan">Prasmanan Pernikahan / Wedding</option>
                            <option value="Rapat / Kantor">Rapat / Gathering Kantor</option>
                            <option value="Syukuran / Khitanan">Syukuran / Khitanan</option>
                            <option value="Ulang Tahun">Pesta Ulang Tahun</option>
                            <option value="Arisan / Keluarga">Arisan Keluarga</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group" style="margin-bottom: 15px;">
                        <label style="font-size: 13px; font-weight: 600; color: #333;">Alamat Pengantaran / Venue</label>
                        <textarea name="alamat" rows="2" class="form-control" placeholder="Tuliskan alamat lengkap lokasi acara..." style="border-radius: 6px;"></textarea>
                    </div>

                    <div class="form-group" style="margin-bottom: 15px;">
                        <label style="font-size: 13px; font-weight: 600; color: #333;">Catatan Tambahan (Opsional)</label>
                        <input type="text" name="catatan" class="form-control" placeholder="Contoh: Sambal dipisah, minta sendok ekstra..." style="border-radius: 6px;">
                    </div>

                    <!-- Kalkulasi Total Harga Realtime -->
                    <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 16px; display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-size: 14px; font-weight: 600; color: #475569;">Estimasi Total:</span>
                        <span style="font-size: 20px; font-weight: 700; color: #fb6e14;" id="modalTotalPrice">Rp 0</span>
                    </div>
                </div>

                <div class="modal-footer" style="background: #fbf9f7; padding: 15px 24px; border-top: 1px solid #eee;">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 20px; padding: 8px 18px;">Batal</button>
                    <button type="submit" class="btn-primary-catering" style="border: none; border-radius: 20px; padding: 10px 24px; cursor: pointer;">
                        <i class="icon-check"></i> Kirim Pesanan Sekarang
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
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content" style="border-radius: 14px; overflow: hidden; border: none; box-shadow: 0 15px 50px rgba(0,0,0,0.3);">
                <div class="modal-header text-center" style="background: #22c55e; color: #fff; padding: 25px 20px; border: none;">
                    <button type="button" class="close" data-dismiss="modal" style="color: #fff; opacity: 0.9;">&times;</button>
                    <div style="font-size: 48px; margin-bottom: 5px;"><i class="icon-check"></i></div>
                    <h3 style="color: #fff; margin: 0; font-weight: 700; font-size: 22px;">Pesanan Berhasil Dikirim!</h3>
                    <p style="margin: 5px 0 0 0; color: #e6ffed; font-size: 13px;">Data pesanan Anda telah tersimpan resmi di sistem Nala Catering.</p>
                </div>

                <div class="modal-body" style="padding: 25px;">
                    <div style="border-bottom: 2px dashed #e2e8f0; padding-bottom: 15px; margin-bottom: 15px; text-align: center;">
                        <div style="font-size: 12px; color: #64748b; text-transform: uppercase; font-weight: 600;">Kode Pesanan</div>
                        <div style="font-size: 22px; font-weight: 800; color: #fb6e14; letter-spacing: 1px;">#{{ $kodePesanan }}</div>
                        <span style="display: inline-block; background: #fef3c7; color: #92400e; font-size: 11px; padding: 2px 10px; border-radius: 12px; font-weight: 600; margin-top: 4px;">Status: Menunggu Konfirmasi</span>
                    </div>

                    <table class="table" style="font-size: 13px; margin-bottom: 15px;">
                        <tr>
                            <td style="color: #64748b; width: 140px; border-top: none;">Nama Pemesan</td>
                            <td style="font-weight: 600; color: #1e293b; border-top: none;">{{ $namaPemesan }}</td>
                        </tr>
                        <tr>
                            <td style="color: #64748b;">No. Handphone</td>
                            <td style="font-weight: 600; color: #1e293b;">{{ $noHp }}</td>
                        </tr>
                        <tr>
                            <td style="color: #64748b;">Menu Catering</td>
                            <td style="font-weight: 600; color: #1e293b;">{{ $namaMenu }}</td>
                        </tr>
                        <tr>
                            <td style="color: #64748b;">Jumlah Pesanan</td>
                            <td style="font-weight: 600; color: #1e293b;">{{ $jumlahPorsi }} Porsi / Box</td>
                        </tr>
                        @if($tanggalAcara)
                        <tr>
                            <td style="color: #64748b;">Tanggal Acara</td>
                            <td style="font-weight: 600; color: #1e293b;">{{ date('d F Y', strtotime($tanggalAcara)) }}</td>
                        </tr>
                        @endif
                        <tr style="background: #f8fafc;">
                            <td style="font-weight: 700; color: #0f172a; font-size: 14px;">Total Tagihan</td>
                            <td style="font-weight: 800; color: #fb6e14; font-size: 16px;">{{ $formattedTotal }}</td>
                        </tr>
                    </table>

                    <div style="background: #eff6ff; border-radius: 8px; padding: 12px; font-size: 12px; color: #1e40af; line-height: 1.6;">
                        <i class="icon-info" style="margin-right: 4px;"></i>
                        Tim Nala Catering akan menghubungi Anda via WhatsApp/Telepon untuk mengonfirmasi detail pengantaran.
                    </div>
                </div>

                <div class="modal-footer text-center" style="background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 15px 20px;">
                    @php
                        $waConfirm = urlencode("Halo Nala Catering, saya baru saja melakukan pemesanan via website dengan Kode Pesanan: " . $kodePesanan . " (" . $namaMenu . " - " . $jumlahPorsi . " porsi). Mohon konfirmasinya.");
                    @endphp
                    <a href="https://api.whatsapp.com/send?phone=6281234567890&text={{ $waConfirm }}" target="_blank"
                       class="btn btn-success" style="border-radius: 20px; font-size: 13px; font-weight: 600; padding: 8px 18px; margin-right: 5px;">
                        <i class="icon-bubbles"></i> Konfirmasi ke WhatsApp (Opsional)
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 20px; font-size: 13px; padding: 8px 18px;">Tutup</button>
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
        
        document.getElementById('modalMenuId').value = id;
        document.getElementById('modalMenuNameInput').value = name;
        document.getElementById('modalMenuName').innerText = name;
        document.getElementById('modalMenuPrice').innerText = formattedPrice;
        document.getElementById('modalMenuMinPortion').innerText = 'Minimal: ' + minPortion + ' Porsi';
        document.getElementById('modalMenuImg').src = imgUrl;

        const portionInput = document.getElementById('modalPortionInput');
        portionInput.min = minPortion;
        portionInput.value = minPortion;

        calcTotal();

        // Attach directly to body so it is completely above any container or backdrop
        $('#orderModal').appendTo('body').modal('show');
    }

    function calcTotal() {
        const portion = parseInt(document.getElementById('modalPortionInput').value) || 0;
        const total = portion * currentItemPrice;
        document.getElementById('modalTotalPrice').innerText = 'Rp ' + total.toLocaleString('id-ID');
    }

    // Auto open success invoice modal if order just placed
    $(document).ready(function() {
        @if(session('order_success'))
            $('#successModal').appendTo('body').modal('show');
        @endif
    });
</script>
@endsection
