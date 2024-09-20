<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\EkskulController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\SmartController;
use App\Http\Controllers\Pelatih\DataSiswaController;
use App\Http\Controllers\Siswa\InfoEkskulController;
use App\Http\Controllers\Siswa\InfoKriteriaController;
use App\Http\Controllers\Siswa\PemilihanEkskulController;
use App\Http\Controllers\Siswa\RiwayatPemilihanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/detail-ekskul', function () {
    return view('detailEkskul');
})->name('detail-ekskul');


// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::prefix('ekskul')->group(function () {
        Route::get('/show', [EkskulController::class, 'index'])->name('ekskul.show');
        Route::post('/store', [EkskulController::class, 'store'])->name('ekskul.store');
        Route::get('/edit/{id}', [EkskulController::class, 'edit'])->name('ekskul.edit');
        Route::post('/update/{id}', [EkskulController::class, 'update'])->name('ekskul.update');
        Route::get('/destroy/{id}', [EkskulController::class, 'destroy'])->name('ekskul.destroy');
        Route::get('/download', [EkskulController::class, 'download'])->name('ekskul.download');
    });

    Route::prefix('kriteria')->group(function () {
        Route::get('/show', [KriteriaController::class, 'index'])->name('kriteria.show');
        Route::post('/store', [KriteriaController::class, 'store'])->name('kriteria.store');
        Route::post('/update/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
        Route::get('/destroy/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');
        Route::get('/download', [KriteriaController::class, 'download'])->name('kriteria.download');
    });

    Route::prefix('smart')->group(function () {
        Route::get('/show', [SmartController::class, 'index'])->name('smart.show');
        Route::get('/detail/{id}', [SmartController::class, 'detail'])->name('smart.detail');
        Route::get('/destroy/{id}', [SmartController::class, 'destroy'])->name('smart.destroy');
        Route::get('/download', [SmartController::class, 'download'])->name('smart.download');
    });

    Route::prefix('siswa')->group(function () {
        Route::get('/show', [SiswaController::class, 'index'])->name('siswa.show');
        Route::get('/download', [SiswaController::class, 'download'])->name('siswa.download');
    });

    Route::prefix('users')->group(function () {
        Route::get('/show', [UserController::class, 'index'])->name('users.show');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/download', [UserController::class, 'download'])->name('user.download');
    });
});

Route::middleware(['auth', 'role:Siswa'])->group(function () {
    Route::prefix('info-ekskul')->group(function () {
        Route::get('/show', [InfoEkskulController::class, 'index'])->name('info-ekskul.show');
    });

    Route::prefix('info-kriteria')->group(function () {
        Route::get('/show', [InfoKriteriaController::class, 'index'])->name('info-kriteria.show');
    });

    Route::prefix('pemilihan-ekskul')->group(function () {
        Route::get('/show', [PemilihanEkskulController::class, 'index'])->name('pemilihan-ekskul.show');
        Route::post('/smart', [PemilihanEkskulController::class, 'smart'])->name('pemilihan-ekskul.smart');
        Route::get('/hasil', [PemilihanEkskulController::class, 'hasil'])->name('pemilihan-hasil.show');
    });

    Route::prefix('riwayat-pemilihan')->group(function () {
        Route::get('/show', [RiwayatPemilihanController::class, 'index'])->name('riwayat-pemilihan.show');
        Route::get('/detail/{id}', [RiwayatPemilihanController::class, 'detail'])->name('riwayat-pemilihan.detail');
    });
});

Route::middleware(['auth', 'role:Pelatih'])->group(function () {
    Route::get('/data-siswa/pelatih/ekskul', [DataSiswaController::class, 'index'])->name('data-siswa.ekskul');
});

Route::middleware(['auth', 'role:Kepala Sekolah'])->group(function () {
    Route::get('/data-siswa/kepsek', [DataSiswaController::class, 'kepsek'])->name('data-siswa.kepsek');
});

Route::middleware(['auth', 'role:Wali Kelas'])->group(function () {
    Route::get('/data-siswa/waliKelas', [DataSiswaController::class, 'waliKelas'])->name('data-siswa.waliKelas');
});

require __DIR__ . '/auth.php';
