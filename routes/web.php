<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\SeleksiController;
use App\Http\Controllers\PeriodeSeleksiController; // Tambahkan ini

// Default page
Route::get('/', function () {
    return view('welcome');
});

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'role:ADMIN'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/pendaftar/{id}/approve', [AdminController::class, 'approvePendaftar'])->name('approve');
    Route::post('/pendaftar/{id}/reject', [AdminController::class, 'rejectPendaftar'])->name('reject');
    Route::put('/profile', [AdminController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/password', [AdminController::class, 'updatePassword'])->name('updatePassword');
    Route::get('/pendaftar/{id}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::put('/pendaftar/{id}/update', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/pendaftar/{id}', [AdminController::class, 'destroy'])->name('delete');
    
    // CRUD admin
    Route::get('create', [AdminController::class, 'create'])->name('create');
    Route::post('store', [AdminController::class, 'store'])->name('store');
    Route::get('edit/{id}', [AdminController::class, 'editAdmin'])->name('edit');
    Route::put('/{id}/update', [AdminController::class, 'updateAdmin'])->name('update');
    Route::delete('delete/{id}', [AdminController::class, 'destroyAdmin'])->name('destroy');

    // Route untuk edit & berkas (AJAX)
    Route::get('/admin/pendaftar/{id}/edit', [AdminController::class, 'editJson']);
    Route::get('/admin/pendaftar/{id}/berkas', [AdminController::class, 'getBerkas']);
    
    // Route update pendaftar
    Route::put('/admin/pendaftar/{id}/update', [AdminController::class, 'update'])->name('admin.update');
    
    // Route approve/reject/delete
    Route::post('/admin/approve/{id}', [AdminController::class, 'approvePendaftar'])->name('admin.approve');
    Route::delete('/admin/reject/{id}', [AdminController::class, 'rejectPendaftar'])->name('admin.reject');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');

    // ✅ Routes Periode Seleksi (perbaikan di sini)
    Route::prefix('periode')->name('periode.')->group(function () {
        Route::get('/', [PeriodeSeleksiController::class, 'index'])->name('index');
        Route::get('/create', [PeriodeSeleksiController::class, 'create'])->name('create');
        Route::post('/', [PeriodeSeleksiController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PeriodeSeleksiController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PeriodeSeleksiController::class, 'update'])->name('update');
        Route::delete('/{id}', [PeriodeSeleksiController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/activate', [PeriodeSeleksiController::class, 'activate'])->name('activate');
    });
    
    // Routes Seleksi
    Route::prefix('seleksi')->name('seleksi.')->group(function () {
        Route::get('/', [SeleksiController::class, 'index'])->name('index');
        Route::post('/proses-otomatis', [SeleksiController::class, 'prosesSeleksiOtomatis'])->name('proses');
        Route::put('/{id}/update-status', [SeleksiController::class, 'updateStatus'])->name('updateStatus');
        Route::get('/export-pdf', [SeleksiController::class, 'exportPdf'])->name('pdf');
        Route::delete('/reset', [SeleksiController::class, 'resetSeleksi'])->name('reset');
    });
});

// Pendaftar routes
Route::middleware(['auth', 'role:PENDAFTAR'])->prefix('pendaftar')->name('pendaftar.')->group(function () {
    Route::get('/dashboard', [PendaftarController::class, 'index'])->name('dashboard');
    Route::post('/update', [PendaftarController::class, 'update'])->name('update');
    Route::post('/upload-berkas', [PendaftarController::class, 'uploadBerkas'])->name('uploadBerkas');
    Route::post('/upload-prestasi', [PendaftarController::class, 'uploadPrestasi'])->name('uploadPrestasi');
    Route::delete('/prestasi/{id}', [PendaftarController::class, 'hapusPrestasi'])->name('hapusPrestasi');
    Route::get('terms', [PendaftarController::class, 'terms'])->name('terms');
    Route::delete('/berkas/{jenis}', [PendaftarController::class, 'hapusBerkas'])->name('hapusBerkas');
    Route::get('/profile', [PendaftarController::class, 'editProfile'])->name('editProfile');
    Route::put('/profile', [PendaftarController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/dashboard/pdf', [PendaftarController::class, 'exportPdf'])->name('dashboard.pdf');
    Route::post('/lock-prestasi', [PendaftarController::class, 'lockPrestasi'])->name('lockPrestasi');
});

// Auth routes
require __DIR__.'/auth.php';