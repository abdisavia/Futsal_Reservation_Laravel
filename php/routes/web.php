<?php

use App\Http\Controllers\DashboardMenyewaController;
use App\Http\Controllers\DashboardLapanganController;
use App\Http\Controllers\DashboardLaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\MenyewaController;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/',  [LapanganController::class, 'index']);

Route::get('/home', [LapanganController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/jadwal/{id_lapangan}', [JadwalController::class, 'index']);
Route::get('/menyewa', [MenyewaController::class, 'index'])->middleware('auth');
Route::post('/menyewa', [MenyewaController::class, 'store'])->middleware('auth');
Route::get('/dashboard', function() {
    return view('dashboard/index');
})->middleware('admin');

Route::resource('/dashboard/lapangan', DashboardLapanganController::class)->middleware('admin');
Route::resource('/dashboard/penyewaan', DashboardMenyewaController::class)->middleware('admin');
// Route::resource('/dashboard/penyewaan/search',  [DashboardMenyewaController::class, 'search'])->middleware('admin');
Route::resource('/dashboard/laporan', DashboardLaporanController::class)->middleware('admin');

// Route::get('/dashboard/penyewaan', [PenyewaanController::class, 'index'])->name('penyewaan.index')->middleware('auth');
Route::delete('/dashboard/penyewaan/{id}', [DashboardMenyewaController::class, 'destroy'])->name('penyewaan.destroy')->middleware('admin');
Route::patch('/dashboard/penyewaan/{id}', [DashboardMenyewaController::class, 'destroy'])->name('penyewaan.updates')->middleware('admin');
// Route::get('/dashboard/penyewaan', [DashboardMenyewaController::class, 'index'])->name('penyewaan.index');
// Route::put('/dashboard/penyewaan/{menyewa}', [DashboardMenyewaController::class, 'update'])->name('penyewaan.update');
// Route::delete('/dashboard/penyewaan/{menyewa}', [DashboardMenyewaController::class, 'destroy'])->name('penyewaan.destroy');
