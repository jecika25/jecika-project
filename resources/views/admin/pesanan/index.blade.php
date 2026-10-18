@extends('admin')

@section('title', 'Data Pesanan & Reservasi Catering')
@section('page_title', 'Pesanan Masuk')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
        <div>
            <h3 class="fw-bold mb-1 text-dark">Data Pesanan & Reservasi Tamu</h3>
            <p class="text-muted mb-0 small">Semua pesanan catering yang dikirim oleh pengunjung melalui website tersimpan di sini.</p>
        </div>
        <div>
            <a href="{{ route('guest.menu') }}" target="_blank" class="btn btn-outline-primary d-inline-flex align-items-center gap-2 shadow-sm px-3 py-2 fw-medium">
                <i class="ti ti-external-link"></i>
                <span>Coba Pesan di Web Tamu</span>
            </a>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold text-dark">Daftar Pesanan Masuk ({{ $orders->total() }})</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Kode Pesanan</th>
                    <th>Nama Pemesan</th>
                    <th>Menu Dipesan</th>
                    <th>Porsi</th>
                    <th>Total Tagihan</th>
                    <th>Tgl Acara</th>
                    <th>Status</th>
                    <th class="text-end">Aksi Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>
                            <span class="fw-bold text-primary">#{{ $order->kode_pesanan }}</span>
                            <div class="text-muted" style="font-size: 11px;">{{ $order->created_at->format('d/m/Y H:i') }}</div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ $order->nama_pemesan }}</div>
                            <div class="small text-muted">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->no_hp) }}" target="_blank" class="text-decoration-none">
                                    <i class="ti ti-brand-whatsapp text-success me-1"></i>{{ $order->no_hp }}
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="fw-semibold">{{ $order->nama_menu }}</div>
                            @if($order->jenis_acara)
                                <span class="badge bg-light text-muted border" style="font-size: 11px;">{{ $order->jenis_acara }}</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-secondary-subtle text-secondary px-2 py-1">{{ $order->jumlah_porsi }} Porsi</span>
                        </td>
                        <td>
                            <span class="fw-bold text-dark">{{ $order->formatted_total }}</span>
                        </td>
                        <td>
                            {{ $order->tanggal_acara ? date('d M Y', strtotime($order->tanggal_acara)) : '-' }}
                        </td>
                        <td>
                            @php
                                $badgeStatus = match($order->status) {
                                    'Pending' => 'bg-warning-subtle text-warning border-warning',
                                    'Dikonfirmasi' => 'bg-info-subtle text-info border-info',
                                    'Diproses' => 'bg-primary-subtle text-primary border-primary',
                                    'Selesai' => 'bg-success-subtle text-success border-success',
                                    'Dibatalkan' => 'bg-danger-subtle text-danger border-danger',
                                    default => 'bg-light text-dark'
                                };
                            @endphp
                            <span class="badge {{ $badgeStatus }} border px-2 py-1">{{ $order->status }}</span>
                        </td>
                        <td class="text-end">
                            <form action="{{ route('admin.pesanan.update', $order->id) }}" method="POST" class="d-inline-flex gap-1">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm" style="width: 130px;" onchange="this.form.submit()">
                                    <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Dikonfirmasi" {{ $order->status == 'Dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
                                    <option value="Diproses" {{ $order->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="Selesai" {{ $order->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Dibatalkan" {{ $order->status == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="ti ti-receipt-off fs-1 d-block mb-2 text-secondary"></i>
                            Belum ada pesanan masuk dari pengunjung website.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($orders->hasPages())
        <div class="card-footer bg-white py-3">
            <div class="d-flex justify-content-center">
                {{ $orders->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endif
</div>
@endsection
