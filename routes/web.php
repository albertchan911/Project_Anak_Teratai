<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenyaluranBantuanController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CatatanAnakController;
use App\Http\Middleware\CheckHeQiAccess;

Route::post('/import-siswa', [SiswaController::class, 'import'])->name('siswa.import');

// Redirect halaman utama ke login
Route::redirect('/', '/login');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route otentikasi
Route::controller(AuthenticatedSessionController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store');
    Route::post('/logout', 'destroy')->name('logout');
});

// Middleware untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route untuk edit dan update siswa
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');

    // Route untuk menghapus siswa
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // Relawan hanya melihat daftar siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index')->middleware('role:relawan');

    // Route untuk menampilkan halaman form tambah siswa
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');

    // Route untuk menyimpan data siswa
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');

    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/penyaluran-bantuan', [PenyaluranBantuanController::class, 'index'])->name('penyaluran-bantuan.index');
    Route::get('/penyaluran-bantuan/create', [PenyaluranBantuanController::class, 'create'])->name('penyaluran-bantuan.create');
    Route::post('/penyaluran-bantuan', [PenyaluranBantuanController::class, 'store'])->name('penyaluran-bantuan.store');

    // Route untuk menampilkan form edit
    Route::get('/penyaluran-bantuan/{id}/edit', [PenyaluranBantuanController::class, 'edit'])->name('penyaluran-bantuan.edit');

    // Route untuk memperbarui data
    Route::put('/penyaluran-bantuan/{id}', [PenyaluranBantuanController::class, 'update'])->name('penyaluran-bantuan.update');

    
    // Rute untuk menghapus
    Route::delete('/penyaluran-bantuan/{id}', [PenyaluranBantuanController::class, 'destroy'])->name('penyaluran-bantuan.destroy');

    // Catatan Perkembangan Anak Teratai - Dengan middleware CheckHeQiAccess
    Route::middleware([CheckHeQiAccess::class])->group(function () {
        Route::get('/siswa/{siswaId}/catatan-anak', [CatatanAnakController::class, 'index'])->name('catatan-anak.index');
        Route::get('/siswa/{siswaId}/catatan-anak/create', [CatatanAnakController::class, 'create'])->name('catatan-anak.create');
        Route::post('/siswa/{siswaId}/catatan-anak', [CatatanAnakController::class, 'store'])->name('catatan-anak.store');
        Route::get('/siswa/{siswaId}/catatan-anak/{catatanId}', [CatatanAnakController::class, 'show'])->name('catatan-anak.show');
        Route::get('/siswa/{siswaId}/catatan-anak/{catatanId}/edit', [CatatanAnakController::class, 'edit'])->name('catatan-anak.edit');
        Route::put('/siswa/{siswaId}/catatan-anak/{catatanId}', [CatatanAnakController::class, 'update'])->name('catatan-anak.update');
        Route::delete('/siswa/{siswaId}/catatan-anak/{catatanId}', [CatatanAnakController::class, 'destroy'])->name('catatan-anak.destroy');
    });
});
