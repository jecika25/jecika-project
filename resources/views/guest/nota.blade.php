@extends('guest')

@section('title', 'Nota Pemesanan #' . $pesanan->kode_pesanan . ' - Nala Catering')

@section('styles')
<style>
    /* Styling Nota / Invoice */
    .nota-card {
        background: #ffffff;
        border: 2px dashed #e2e8f0;
        border-radius: 16px;
        position: relative;
        overflow: hidden;
    }

    .nota-header-bg {
        background: linear-gradient(135deg, #fef6ec 0%, #fff7eb 100%);
        border-bottom: 2px dashed #cbd5e1;
    }

    .nota-badge {
        font-family: monospace;
        letter-spacing: 1px;
    }

    .nota-divider {
        border-top: 2px dashed #cbd5e1;
        margin: 20px 0;
    }

    .watermark-stamp {
        position: absolute;
        right: 40px;
        bottom: 120px;
        border: 3px solid rgba(217, 119, 6, 0.25);
        color: rgba(217, 119, 6, 0.35);
        font-size: 22px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 3px;
        padding: 10px 24px;
        border-radius: 8px;
        transform: rotate(-12deg);
        pointer-events: none;
        user-select: none;
    }

    /* Print Stylesheet */
    @media print {
        body {
            background: #ffffff !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .navbar, 
        .hero-header, 
        .footer, 
        .back-to-top, 
        .d-print-none,
        #spinner {
            display: none !important;
        }

        .container {
            max-width: 100% !important;
            width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .nota-card {
            border: 1px solid #000 !important;
            box-shadow: none !important;
            border-radius: 0 !important;
            margin: 0 !important;
        }

        .nota-header-bg {
            background: #f8f9fa !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }
</style>
@endsection

@section('content')
<!-- Spacing Top -->
<div class="container-fluid bg-light py-5 mt-0 d-print-none">
    <div class="container text-center">
        <span class="badge bg-success-subtle text-success border border-success px-3 py-2 rounded-pill fw-semibold mb-2">
            <i class="fas fa-check-circle me-1"></i> Pesanan Berhasil Dikirim!
        </span>
        <h2 class="fw-bold mb-1" style="font-family: 'Playball', cursive; font-size: 38px;">Bukti Nota Pemesanan</h2>
        <p class="text-muted small mb-0">Simpan atau cetak nota ini sebagai bukti pemesanan resmi Anda di Nala Catering.</p>
    </div>
</div>

<div class="container py-4 my-3">
    <!-- ACTION BUTTONS (D-PRINT-NONE) -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4 d-print-none">
        <a href="{{ route('guest.menu') }}" class="btn btn-outline-secondary rounded-pill px-4">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Katalog Menu
        </a>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-primary text-white rounded-pill px-4 fw-semibold shadow-sm" onclick="window.print()">
                <i class="fas fa-print me-1"></i> Cetak / Print Nota
            </button>
            @php
                $waText = urlencode("Halo Nala Catering, saya telah memesan catering melalui website.\n\n"
                    . "Kode Nota: #" . $pesanan->kode_pesanan . "\n"
                    . "Nama: " . $pesanan->nama_pemesan . "\n"
                    . "Menu: " . $pesanan->nama_menu . " (" . $pesanan->jumlah_porsi . " Porsi)\n"
                    . "Total: " . $pesanan->formatted_total . "\n"
                    . "Tanggal Acara: " . ($pesanan->tanggal_acara ? date('d/m/Y', strtotime($pesanan->tanggal_acara)) : '-') . "\n\n"
                    . "Mohon dikonfirmasi rincian pengantaran dan pembayarannya. Terima kasih!");
            @endphp
            <a href="https://api.whatsapp.com/send?phone=6281234567890&text={{ $waText }}" target="_blank" class="btn btn-success rounded-pill px-4 fw-semibold text-white shadow-sm">
                <i class="fab fa-whatsapp me-1"></i> Konfirmasi ke WhatsApp
            </a>
        </div>
    </div>

    <!-- LEMBAR NOTA RESMI -->
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-9">
            <div class="card nota-card shadow-sm p-0">
                <!-- Header Nota -->
                <div class="nota-header-bg p-4 p-md-5">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ asset('assets-guest/img/nala-logo.png') }}" alt="Nala Catering" style="max-height: 70px; object-fit: contain;">
                            <div>
                                <h3 class="fw-bold mb-0 text-dark" style="font-family: 'Playball', cursive; font-size: 28px;">Nala Catering & Food</h3>
                                <div class="text-muted small">Solusi Catering Prasmanan, Nasi Kotak & Event Khusus</div>
                                <div class="text-muted small"><i class="fas fa-map-marker-alt text-primary me-1"></i> Jl. Hangtuah No. 45, Pekanbaru, Riau • Telp / WA: 0812-3456-7890</div>
                            </div>
                        </div>
                        <div class="text-md-end">
                            <span class="badge bg-warning text-dark px-3 py-1 rounded-pill nota-badge mb-1">
                                STATUS: {{ strtoupper($pesanan->status) }}
                            </span>
                            <div class="text-muted small">No. Nota / Invoice:</div>
                            <div class="fs-4 fw-bold text-primary">#{{ $pesanan->kode_pesanan }}</div>
                        </div>
                    </div>
                </div>

                <!-- Watermark Cap Digital -->
                <div class="watermark-stamp">
                    NALA CATERING RESMI
                </div>

                <!-- Isi Nota -->
                <div class="card-body p-4 p-md-5">
                    <!-- Data Ringkas 2 Kolom -->
                    <div class="row g-4 mb-4">
                        <div class="col-12 col-sm-6">
                            <h6 class="text-muted text-uppercase fw-bold small mb-2"><i class="fas fa-user text-primary me-1"></i> Ditujukan Kepada:</h6>
                            <div class="fw-bold text-dark fs-5">{{ $pesanan->nama_pemesan }}</div>
                            <div class="text-muted small"><i class="fas fa-phone text-muted me-1"></i> {{ $pesanan->no_hp }}</div>
                            @if($pesanan->email)
                                <div class="text-muted small"><i class="fas fa-envelope text-muted me-1"></i> {{ $pesanan->email }}</div>
                            @endif
                            @if($pesanan->alamat)
                                <div class="text-muted small mt-1">
                                    <i class="fas fa-map-pin text-muted me-1"></i> Alamat: <em>{{ $pesanan->alamat }}</em>
                                </div>
                            @endif
                        </div>

                        <div class="col-12 col-sm-6 text-sm-end">
                            <h6 class="text-muted text-uppercase fw-bold small mb-2"><i class="fas fa-calendar-alt text-primary me-1"></i> Rincian Jadwal:</h6>
                            <div class="small text-muted">Tanggal Pemesanan:</div>
                            <div class="fw-semibold text-dark">{{ $pesanan->created_at->format('d F Y, H:i') }} WIB</div>
                            
                            <div class="small text-muted mt-2">Tanggal Pelaksanaan Acara:</div>
                            <div class="fw-bold text-primary">
                                {{ $pesanan->tanggal_acara ? date('d F Y', strtotime($pesanan->tanggal_acara)) : 'Menunggu Konfirmasi' }}
                            </div>

                            @if($pesanan->jenis_acara)
                                <div class="small text-muted mt-1">Jenis Acara: <strong>{{ $pesanan->jenis_acara }}</strong></div>
                            @endif
                        </div>
                    </div>

                    <div class="nota-divider"></div>

                    <!-- Tabel Item Pesanan -->
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 50px;" class="text-center">No</th>
                                    <th>Deskripsi Menu / Sajian Catering</th>
                                    <th class="text-center" style="width: 140px;">Jumlah Porsi</th>
                                    <th class="text-end" style="width: 160px;">Harga Satuan</th>
                                    <th class="text-end" style="width: 180px;">Total Tagihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>
                                        <div class="fw-bold text-dark">{{ $pesanan->nama_menu }}</div>
                                        @if($pesanan->catatan)
                                            <small class="text-muted d-block mt-1">
                                                <i class="fas fa-info-circle text-primary me-1"></i> Catatan: {{ $pesanan->catatan }}
                                            </small>
                                        @endif
                                    </td>
                                    <td class="text-center fw-semibold">{{ $pesanan->jumlah_porsi }} Porsi / Box</td>
                                    @php
                                        $unitPrice = $pesanan->total_harga / max(1, $pesanan->jumlah_porsi);
                                    @endphp
                                    <td class="text-end">Rp {{ number_format($unitPrice, 0, ',', '.') }}</td>
                                    <td class="text-end fw-bold text-dark">{{ $pesanan->formatted_total }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="table-light">
                                    <td colspan="4" class="text-end fw-bold fs-6 text-dark py-3">GRAND TOTAL BIAYA:</td>
                                    <td class="text-end fw-bold fs-5 text-primary py-3">{{ $pesanan->formatted_total }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Catatan Footer Nota -->
                    <div class="row align-items-end g-4 pt-3">
                        <div class="col-12 col-md-8">
                            <div class="p-3 bg-light rounded-3 border">
                                <h6 class="fw-bold text-dark small mb-1"><i class="fas fa-shield-alt text-success me-1"></i> Syarat & Ketentuan Pembayaran:</h6>
                                <ol class="small text-muted mb-0 ps-3" style="line-height: 1.6;">
                                    <li>Nota ini adalah bukti sah pemesanan via website resmi Nala Catering.</li>
                                    <li>Tim CS kami akan segera menghubungi nomor WhatsApp Anda untuk konfirmasi menu & detail pengantaran.</li>
                                    <li>Pembayaran uang muka (DP) dilakukan setelah pesanan dikonfirmasi oleh admin.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center">
                            <div class="small text-muted mb-4">Hormat Kami,</div>
                            <div class="fw-bold text-dark border-bottom pb-1 mx-auto" style="max-width: 180px;">
                                Tim Nala Catering
                            </div>
                            <small class="text-muted d-block mt-1">Finance & Operational</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
