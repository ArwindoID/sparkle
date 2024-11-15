<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ZonaController;

// Autentikasi
Route::get('/', [LoginController::class, 'index'])->name('login'); // Menampilkan halaman login
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses'); // Memproses login (gunakan POST)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Logout (gunakan POST)
Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Fitur Utama - Zona
Route::prefix('zona')->name('zona.')->group(function () {
    Route::get('/1', [ZonaController::class, 'zona1'])->name('1');
    Route::get('/2', [ZonaController::class, 'zona2'])->name('2');
    Route::get('/3', [ZonaController::class, 'zona3'])->name('3');
    Route::get('/4', [ZonaController::class, 'zona4'])->name('4');
    Route::get('/5', [ZonaController::class, 'zona5'])->name('5');
    Route::get('/6', [ZonaController::class, 'zona6'])->name('6');
});
