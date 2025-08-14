<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HistoryController; // <-- TAMBAHKAN BARIS INI

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute untuk Dashboard Publik
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.public');

// Rute default dari Breeze, mengarahkan ke halaman admin kita
Route::get('/dashboard', function () {
    return redirect()->route('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup Rute untuk Halaman Admin
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // URL: /admin
    Route::get('/', [PaketController::class, 'index'])->name('index');

    // URL: /admin/history
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');

    // URL: /admin/paket/create
    Route::get('/paket/create', [PaketController::class, 'create'])->name('paket.create');

    // URL: /admin/paket (Method: POST)
    Route::post('/paket', [PaketController::class, 'store'])->name('paket.store');

    // URL: /admin/paket/{paket}/ambil (Method: PATCH)
    Route::patch('/paket/{paket}/ambil', [PaketController::class, 'tandaiDiambil'])->name('paket.ambil');
});

// Grup Rute untuk profil pengguna dari Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Ini akan memuat rute login, register, dll. dari Breeze.
require __DIR__.'/auth.php';    