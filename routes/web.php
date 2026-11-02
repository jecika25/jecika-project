<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MenuCateringController;
use App\Http\Controllers\PaketCateringController;
use App\Http\Controllers\Guest\MenuGuestController;

/*
|--------------------------------------------------------------------------
| Web Routes - Nala Catering UAS
|--------------------------------------------------------------------------
*/

// 1. Guest / Public Routes
Route::get('/', [MenuCateringController::class, 'guestIndex'])->name('guest.home');
Route::get('/menu', [MenuCateringController::class, 'guestIndex'])->name('guest.menu');
Route::post('/pesan-menu', [MenuCateringController::class, 'submitOrder'])->name('guest.order');
Route::get('/nota/{kode_pesanan}', [MenuCateringController::class, 'showNota'])->name('guest.nota');
// Route untuk Halaman Guest (Daftar Menu Catering)
Route::get('/menu-catering', [MenuGuestController::class, 'index'])->name('guest.menu.index');

// Auth Routes (Soal 1 & Soal 2)
Route::get('/auth', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/auth', [AuthController::class, 'login'])->name('login.process');
Route::post('/login', [AuthController::class, 'login']);    

// Route GET Register (Menampilkan Form)
Route::get('/register', function () {
    return view('layouts.guest.register');
})->name('register');

// TAMBAHKAN ROUTE POST REGISTER INI:
Route::post('/register', function () {
    return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
})->name('register.process');

// 2. Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.menu.index');
    });

    Route::resource('menu', MenuCateringController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('paket', PaketCateringController::class);
    Route::resource('user', UserController::class);

    Route::get('pesanan', [MenuCateringController::class, 'adminOrders'])->name('pesanan.index');
    Route::put('pesanan/{id}', [MenuCateringController::class, 'updateOrderStatus'])->name('pesanan.update');
});