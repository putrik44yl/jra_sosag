<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// FRONTEND CONTROLLER
use App\Http\Controllers\FrontendController;

// CONTACT CONTROLLER (tambahin ini)
use App\Http\Controllers\ContactController;


// ==========================
// FRONTEND ROUTES
// ==========================
Route::get('/', [FrontendController::class, 'welcome'])->name('frontend.home');


// ==========================
// CONTACT ROUTE
// ==========================
Route::post('/contact/send', [ContactController::class, 'store'])->name('contact.send');


// ======================================
// DETAIL LAYANAN (Halaman Selengkapnya)
// ======================================
Route::prefix('layanan')->group(function () {
    Route::view('/pemulasaraan', 'layanan.pemulasaraan')->name('layanan.pemulasaraan');
    Route::view('/ambulans', 'layanan.ambulans')->name('layanan.ambulans');
    Route::view('/pemakaman', 'layanan.pemakaman')->name('layanan.pemakaman');
    Route::view('/sarana', 'layanan.sarana')->name('layanan.sarana');
    Route::view('/pengguna-ambulans', 'layanan.pengguna')->name('layanan.pengguna');
    Route::view('/anggota', 'layanan.anggota')->name('layanan.anggota');
});


// ======================================
// ADMIN CONTROLLERS
// ======================================
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AnggotasController;
use App\Http\Controllers\Admin\PemulasaraansController;
use App\Http\Controllers\Admin\AmbulansController;
use App\Http\Controllers\Admin\PenggunaAmbulansController;
use App\Http\Controllers\Admin\SaranasController;
use App\Http\Controllers\Admin\PenggunaSaranasController;
use App\HttpControllers\Admin\UserController;
use App\Http\Controllers\Admin\KeuanganController;
use App\Http\Controllers\Admin\PemakamanController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\ContactAdminController;


// ======================================
// ANGGOTA CONTROLLERS
// ======================================
use App\Http\Controllers\Anggota\DashboardAnggotaController;
use App\Http\Controllers\Anggota\ProfilController;
use App\Http\Controllers\Anggota\TugasController;
use App\Http\Controllers\Anggota\JadwallController;


// ======================================
// AUTH (Login, Register)
// ======================================
Auth::routes();


// ======================================
// REDIRECT DASHBOARD BERDASARKAN ROLE
// ======================================
Route::get('/dashboard', function () {

    $role = auth()->user()->role ?? null;

    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'anggota' => redirect()->route('anggota.dashboard'),
        default => redirect('/'),
    };

})
->middleware('auth')
->name('dashboard');


// ======================================
// ADMIN ROUTES
// ======================================
Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('users', UserController::class);
        Route::resource('anggota_jra', AnggotasController::class);
        Route::resource('pemulasaraan', PemulasaraansController::class);
        Route::resource('ambulans', AmbulansController::class);
        Route::resource('pengguna_ambulans', PenggunaAmbulansController::class);
        Route::resource('sarana', SaranasController::class);
        Route::resource('pengguna_sarana', PenggunaSaranasController::class);
        Route::resource('keuangan', KeuanganController::class);
        Route::resource('pemakaman', PemakamanController::class);
        Route::resource('galeri', GaleriController::class);

        // CONTACT ADMIN ROUTE (FIX ERROR)
        Route::get('/contact', [ContactAdminController::class, 'index'])->name('contact.index');
    });


// ======================================
// ANGGOTA ROUTES
// ======================================
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
