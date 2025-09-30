<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ===============================
// Admin Controllers
// ===============================
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AnggotasController;
use App\Http\Controllers\Admin\PemulasaraansController;
use App\Http\Controllers\Admin\AmbulansController;
use App\Http\Controllers\Admin\PenggunaAmbulansController;
use App\Http\Controllers\Admin\SaranasController;
use App\Http\Controllers\Admin\PenggunaSaranasController;
use App\Http\Controllers\Admin\UserController;

// ===============================
// Anggota Controllers
// ===============================
use App\Http\Controllers\Anggota\DashboardAnggotaController;
use App\Http\Controllers\Anggota\ProfilController;
use App\Http\Controllers\Anggota\TugasController;
use App\Http\Controllers\Anggota\JadwallController;

// ===============================
// Landing / Default
// ===============================
Route::get('/', function () {
    return view('welcome');
});

// ===============================
// Auth default (login, register, dll.)
// ===============================
Auth::routes();

// ===============================
// Redirect Dashboard Global
// ===============================
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    if (auth()->user()->role === 'anggota') {
        return redirect()->route('anggota.dashboard');
    }
    return redirect('/'); // fallback
})->middleware('auth')->name('dashboard');

// ===============================
// Admin Routes
// ===============================
Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->name('admin.')
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
// Anggota Routes
// ===============================
Route::prefix('anggota')
    ->middleware(['auth', 'role:anggota'])
    ->name('anggota.')
    ->group(function () {
        Route::get('/dashboard', [DashboardAnggotaController::class, 'index'])
            ->name('dashboard');

        Route::resource('profil', ProfilController::class);
        Route::resource('tugas', TugasController::class);
        Route::resource('jadwalls', JadwallController::class);
    });
