<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

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


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::post('/select-user/{id}', [AdminDashboardController::class, 'selectUser'])->name('select-user');
});



use App\Http\Controllers\PendaftarController;

Route::middleware(['auth', 'role:pendaftar'])->group(function () {
    Route::get('/pendaftar/dashboard', [PendaftarController::class, 'index'])->name('pendaftar.dashboard');
    Route::post('/pendaftar/update', [PendaftarController::class, 'update'])->name('pendaftar.update');
    Route::post('/pendaftar/upload-berkas', [PendaftarController::class, 'uploadBerkas'])->name('pendaftar.uploadBerkas');
    
    // ✅ Tambahkan ini
    Route::post('/pendaftar/upload-prestasi', [PendaftarController::class, 'uploadPrestasi'])->name('pendaftar.uploadPrestasi');
});




Route::middleware(['auth'])->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'editProfile'])->name('admin.profile');
    Route::put('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::put('/admin/password/update', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');
});




Route::put('/admin/update-profile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
Route::put('/admin/update-password', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');








require __DIR__.'/auth.php';
