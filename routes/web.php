<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotasController;

Route::get('/', function () {
    // langsung arahkan ke dashboard admin
    return redirect()->route('admin.dashboard');
});

// route admin dashboard
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route anggota
Route::resource('anggota_jra', AnggotasController::class);
