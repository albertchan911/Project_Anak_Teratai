<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenyaluranBantuanController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\CheckHeQiAccess;
use App\Http\Controllers\PenilaianCatatanController;
use App\Http\Controllers\NilaiController;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

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

// Route untuk menampilkan daftar penilaian
Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
// Route untuk menampilkan form tambah penilaian
Route::get('/penilaian/create', [PenilaianController::class, 'create'])->name('penilaian.create');
// Route untuk menyimpan penilaian baru
Route::post('/penilaian', [PenilaianController::class, 'store'])->name('penilaian.store');
// Route untuk menampilkan form edit penilaian
Route::get('/penilaian/{id}/edit', [PenilaianController::class, 'edit'])->name('penilaian.edit');
// Route untuk mengupdate penilaian
Route::put('/penilaian/{id}', [PenilaianController::class, 'update'])->name('penilaian.update');
// Route untuk menghapus penilaian
Route::delete('/penilaian/{id}', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');

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

    // Rute untuk menghapus
    Route::delete('/penyaluran-bantuan/{id}', [PenyaluranBantuanController::class, 'destroy'])->name('penyaluran-bantuan.destroy');
    Route::get('/penyaluran-bantuan/{id}/upload-kwitansi', [PenyaluranBantuanController::class, 'showUploadKwitansi'])->name('penyaluran-bantuan.show_upload_kwitansi');
    Route::post('/penyaluran-bantuan/{id}/upload-kwitansi', [PenyaluranBantuanController::class, 'uploadKwitansi'])->name('penyaluran-bantuan.upload_kwitansi');

    Route::get('/penyaluran-bantuan/{id}/edit', [PenyaluranBantuanController::class, 'edit'])->name('penyaluran-bantuan.edit');
Route::put('/penyaluran-bantuan/{id}', [PenyaluranBantuanController::class, 'update'])->name('penyaluran-bantuan.update');



Route::get('/siswa/{siswa}/nilai/create', [NilaiController::class, 'create'])->name('nilai.create');
Route::post('/siswa/{siswa}/nilai', [NilaiController::class, 'store'])->name('nilai.store');

Route::get('/dashboard/export', [DashboardController::class, 'export'])->name('dashboard.export');  // Route untuk ekspor
Route::get('penyaluran-bantuan/report', [PenyaluranBantuanController::class, 'report'])->name('penyaluran-bantuan.report');
Route::get('penyaluran-bantuan/report/export', [PenyaluranBantuanController::class, 'exportReport'])->name('penyaluran-bantuan.exportReport');



});
