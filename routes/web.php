<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MenuCateringController;

/*
|--------------------------------------------------------------------------
| Web Routes - Nala Catering UAS
|--------------------------------------------------------------------------
*/

// Guest / Public Routes (Template guest.blade.php)
Route::get('/', [MenuCateringController::class, 'guestIndex'])->name('guest.home');
Route::get('/menu', [MenuCateringController::class, 'guestIndex'])->name('guest.menu');
Route::post('/pesan-menu', [MenuCateringController::class, 'submitOrder'])->name('guest.order');

// Admin Routes (Template admin.blade.php)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.menu.index');
    });
    
    // Resource Controller CRUD Menu Catering
    Route::resource('menu', MenuCateringController::class);

    // Orders / Reservasi Masuk
    Route::get('pesanan', [MenuCateringController::class, 'adminOrders'])->name('pesanan.index');
    Route::put('pesanan/{id}', [MenuCateringController::class, 'updateOrderStatus'])->name('pesanan.update');
});

// Pelanggan Resource
Route::resource('pelanggan', PelangganController::class);
