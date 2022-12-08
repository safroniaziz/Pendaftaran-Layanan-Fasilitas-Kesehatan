<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\RoleController;
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
});

Route::controller(LayananController::class)->group(function(){
    Route::get('/manajemen_layanan','index')->name('layanans');
    Route::get('/manajemen_layanan/create','create')->name('layanans.create');
    Route::post('/manajemen_layanan','post')->name('layanans.post');
});

Route::controller(RoleController::class)->group(function(){
    Route::get('/manajemen_akses','index')->name('roles');
});

