<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\SeleksiController;
use App\Http\Controllers\BerkasController;

// Default page
Route::get('/', function () {
    return view('welcome');
});

// Auth user routes
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ADMIN routes
Route::middleware(['auth','role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password', [AdminController::class, 'updatePassword'])->name('updatePassword');

    Route::resource('/seleksi', SeleksiController::class);
});

// PENDAFTAR routes
Route::middleware(['auth','role:pendaftar'])->prefix('pendaftar')->name('pendaftar.')->group(function () {

    Route::get('/dashboard', [PendaftarController::class, 'index'])->name('dashboard');

    Route::post('/update', [PendaftarController::class, 'update'])->name('update');

    Route::post('/upload-berkas', [PendaftarController::class, 'uploadBerkas'])->name('uploadBerkas');
    Route::post('/upload-prestasi', [PendaftarController::class, 'uploadPrestasi'])->name('uploadPrestasi');

    Route::resource('/berkas', BerkasController::class);
});


Route::post('/admin/seleksi-otomatis', [AdminController::class, 'seleksiOtomatis'])
    ->name('admin.seleksi.otomatis');

Route::put('/admin/seleksi/{id}', [AdminController::class, 'updateSeleksi'])
    ->name('admin.seleksi.update');


// IMPORTANT: auth routes MUST remain at the very bottom
require __DIR__.'/auth.php';
