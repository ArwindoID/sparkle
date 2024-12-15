<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ZoneController;

// Autentikasi
Route::get('/', [LoginController::class, 'index'])->name('login'); // Menampilkan halaman login
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses'); // Memproses login (gunakan POST)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Logout (gunakan POST)
Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/zone/{id}', [ZoneController::class, 'show'])->name('zone.show');

