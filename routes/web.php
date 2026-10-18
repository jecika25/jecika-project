<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MenuCateringController;
use App\Http\Controllers\PaketCateringController;

/*
|--------------------------------------------------------------------------
| Web Routes - Nala Catering UAS
|--------------------------------------------------------------------------
*/

// Guest / Public Routes (Template guest.blade.php)
Route::get('/', [MenuCateringController::class, 'guestIndex'])->name('guest.home');
Route::get('/menu', [MenuCateringController::class, 'guestIndex'])->name('guest.menu');
Route::post('/pesan-menu', [MenuCateringController::class, 'submitOrder'])->name('guest.order');
Route::get('/nota/{kode_pesanan}', [MenuCateringController::class, 'showNota'])->name('guest.nota');

// Admin Routes (Template admin.blade.php)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.menu.index');
    });
    
    // Master Tabel 1: Menu Catering
    Route::resource('menu', MenuCateringController::class);

    // Master Tabel 2: Pelanggan
    Route::resource('pelanggan', PelangganController::class);

    // Master Tabel 3: Paket Catering
    Route::resource('paket', PaketCateringController::class);

    // Transaksi: Pesanan Masuk
    Route::get('pesanan', [MenuCateringController::class, 'adminOrders'])->name('pesanan.index');
    Route::put('pesanan/{id}', [MenuCateringController::class, 'updateOrderStatus'])->name('pesanan.update');
});

// Top-Level Aliases (agar URL /pelanggan, /paket, /menu langsung bisa diakses dosen)
Route::resource('pelanggan', PelangganController::class);
Route::get('/paket', function() {
    return redirect()->route('admin.paket.index');
});
