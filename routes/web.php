<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotasController;
use App\Http\Controllers\PemulasaraansController;
use App\Http\Controllers\AmbulansController;
use App\Http\Controllers\PenggunaAmbulansController;
use App\Http\Controllers\SaranasController;
use App\Http\Controllers\PenggunaSaranasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\DashboardAnggotaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\JadwalController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// ===============================
// Admin
// ===============================
Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('anggota_jra', AnggotasController::class);
        Route::resource('pemulasaraan', PemulasaraansController::class);
        Route::resource('ambulans', AmbulansController::class);
        Route::resource('pengguna_ambulans', PenggunaAmbulansController::class);
        Route::resource('sarana', SaranasController::class);
        Route::resource('pengguna_sarana', PenggunaSaranasController::class);
    });

// ===============================
// Anggota
// ===============================
Route::prefix('anggota')
    ->middleware(['auth', 'role:anggota'])
    ->group(function () {
        Route::get('/dashboard', [DashboardAnggotaController::class, 'index'])->name('dashboard.anggota');
        Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
        Route::resource('/tugas', TugasController::class);
        Route::resource('/jadwal', JadwalController::class);
    });