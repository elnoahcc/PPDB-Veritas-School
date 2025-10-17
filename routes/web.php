<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendaftarController;

Route::get('/', function () {
    return view('welcome');
});
// Resource untuk admin
    Route::resource('/admin/seleksi', SeleksiController::class)->names('admin.seleksi');

    // Resource untuk pendaftar
    Route::resource('/pendaftar/berkas', BerkasController::class)->names('pendaftar.berkas');

Route::middleware(['auth'])->group(function () {
    // Dashboard tunggal
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
