<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ZoneController;

// Autentikasi
Route::get('/', [loginController::class, 'index'])->name('login'); // Menampilkan halaman login
Route::post('/login_proses', [loginController::class, 'login_proses'])->name('login_proses'); // Memproses login (gunakan POST)
Route::post('/logout', [loginController::class, 'logout'])->name('logout'); // Logout (gunakan POST)
Route::get('/registrasi', [registrasiController::class, 'index'])->name('registrasi');
Route::post('/registrasi-proses', [registrasiController::class, 'registrasi_proses'])->name('registrasi.proses');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/zone/{id}', [ZoneController::class, 'show'])->name('zone.show');

