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
});
// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::prefix('ekskul')->group(function () {
        Route::get('/show', [EkskulController::class, 'index'])->name('ekskul.show');
    });

    Route::prefix('kriteria')->group(function () {
        Route::get('/show', [KriteriaController::class, 'index'])->name('kriteria.show');
    });

    Route::prefix('smart')->group(function () {
        Route::get('/show', [SmartController::class, 'index'])->name('smart.show');
        Route::get('/detail', [SmartController::class, 'detail'])->name('smart.detail');
    });

    Route::prefix('siswa')->group(function () {
        Route::get('/show', [SiswaController::class, 'index'])->name('siswa.show');
    });

    Route::prefix('users')->group(function () {
        Route::get('/show', [UserController::class, 'index'])->name('users.show');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
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
        Route::get('/hasil', [PemilihanEkskulController::class, 'hasil'])->name('pemilihan-hasil.show');
    });

    Route::prefix('riwayat-pemilihan')->group(function () {
        Route::get('/show', [RiwayatPemilihanController::class, 'index'])->name('riwayat-pemilihan.show');
    });
});

Route::middleware(['auth', 'role:Pelatih'])->group(function () {
    Route::get('/data-siswa/pelatih/ekskul', [DataSiswaController::class, 'index'])->name('data-siswa.ekskul');
});

Route::middleware(['auth', 'role:Kepala Sekolah'])->group(function () {
    Route::get('/data-siswa/kepsek', [DataSiswaController::class, 'kepsek'])->name('data-siswa.kepsek');
});

require __DIR__ . '/auth.php';
