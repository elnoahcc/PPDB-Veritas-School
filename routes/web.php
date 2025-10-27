<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\SeleksiController;
use App\Http\Controllers\BerkasController;

use App\Http\Middleware\RoleMiddleware;

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/pendaftar/{id}/approve', [AdminController::class, 'approvePendaftar'])->name('admin.approve');
    Route::post('/pendaftar/{id}/reject', [AdminController::class, 'rejectPendaftar'])->name('admin.reject');
    Route::put('/profile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::post('/password', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');
});

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



// PENDAFTAR routes
Route::middleware(['auth','role:PENDAFTAR'])->prefix('pendaftar')->name('pendaftar.')->group(function () {

    Route::get('/dashboard', [PendaftarController::class, 'index'])->name('dashboard');

    Route::post('/update', [PendaftarController::class, 'update'])->name('update');

    Route::post('/upload-berkas', [PendaftarController::class, 'uploadBerkas'])->name('uploadBerkas');
    Route::post('/upload-prestasi', [PendaftarController::class, 'uploadPrestasi'])->name('uploadPrestasi');

    Route::resource('/berkas', BerkasController::class);
});



    Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/pendaftar/{id}/approve', [AdminController::class, 'approvePendaftar'])->name('admin.approve');
    Route::post('/admin/pendaftar/{id}/reject', [AdminController::class, 'rejectPendaftar'])->name('admin.reject');
});

// IMPORTANT: auth routes MUST remain at the very bottom
require __DIR__.'/auth.php';
