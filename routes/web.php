<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MitraController;

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

Route::controller(MitraController::class)->group(function(){
    Route::get('/manajemen_data_mitra','index')->name('mitras');
    Route::get('/manajemen_data_mitra/create','create')->name('mitras.create');
    Route::post('/manajemen_data_mitra','post')->name('mitras.post');
    Route::get('/manajemen_data_mitra/{mitra}/edit','edit')->name('mitras.edit');
    Route::patch('/manajemen_data_mitra/{mitra}/update','update')->name('mitras.update');
    Route::delete('/manajemen_data_mitra/{mitra}/delete','delete')->name('mitras.delete');
});

Route::controller(LayananController::class)->group(function(){
    Route::get('/manajemen_layanan','index')->name('layanans');
    Route::get('/manajemen_layanan/create','create')->name('layanans.create');
    Route::post('/manajemen_layanan','post')->name('layanans.post');
    Route::get('/manajemen_layanan/{layanan}/edit','edit')->name('layanans.edit');
    Route::patch('/manajemen_layanan/{layanan}/update','update')->name('layanans.update');
    Route::delete('/manajemen_layanan/{layanan}/delete','delete')->name('layanans.delete');
});

Route::controller(RoleController::class)->group(function(){
    Route::get('/manajemen_akses','index')->name('roles');
});

