<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalPelayananController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/daftar', [HomeController::class, 'daftar'])->name('daftar');

Route::controller(MitraController::class)->group(function(){
    Route::get('/manajemen_data_mitra','index')->name('mitras');
});

Route::controller(LayananController::class)->group(function(){
    Route::get('/manajemen_layanan','index')->name('layanans');
    Route::get('/manajemen_layanan/create','create')->name('layanans.create');
    Route::post('/manajemen_layanan','post')->name('layanans.post');
    Route::get('/manajemen_layanan/{layanan}/edit','edit')->name('layanans.edit');
    Route::patch('/manajemen_layanan/{layanan}/update','update')->name('layanans.update');
    Route::delete('/manajemen_layanan/{layanan}/delete','delete')->name('layanans.delete');
});

Route::controller(JadwalPelayananController::class)->group(function(){
    Route::get('/jadwal_pelayanan','index')->name('jadwals');
    Route::get('/jadwal_pelayanan/create','create')->name('jadwals.create');
    Route::post('/jadwal_pelayanan','post')->name('jadwals.post');
    Route::get('/jadwal_pelayanan/{jadwal}/edit','edit')->name('jadwals.edit');
    Route::patch('/jadwal_pelayanan/{jadwal}/update','update')->name('jadwals.update');
    Route::delete('/jadwal_pelayanan/{jadwal}/delete','delete')->name('jadwals.delete');

    Route::controller(SesiController::class)->prefix('jadwal_pelayanan')->group(function() {
        Route::get('{jadwal}/sesi','index')->name('sesis');
        Route::get('{jadwal}/sesi/create','create')->name('sesis.create');
        Route::post('{jadwal}/sesi','post')->name('sesis.post');
    });
});


Route::controller(RoleController::class)->group(function(){
    Route::get('/manajemen_akses','index')->name('roles');
});

