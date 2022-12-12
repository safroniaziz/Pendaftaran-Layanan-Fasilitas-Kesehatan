<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalPelayananController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\SesiController;
use App\Models\Mitra;
use App\Http\Controllers\AlurLayananController;
use App\Http\Controllers\DetailAlurLayananController;
use App\Http\Controllers\SyaratPendaftaranController;
use App\Http\Controllers\PendaftarController;
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
    $mitras = Mitra::orderBy('id','asc')->get();
    return view('welcome',[
        'mitras'    =>  $mitras,
    ]);
})->name('welcome');

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/daftar', [HomeController::class, 'daftar'])->name('daftar');

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
        Route::get('{jadwal}/edit/{sesi}','edit')->name('sesis.edit');
        Route::patch('{jadwal}/update/{sesi}','update')->name('sesis.update');
        Route::delete('{jadwal}/delete/{sesi}','delete')->name('sesis.delete');
});


Route::controller(AlurLayananController::class)->group(function(){
        Route::get('/manajemen_alur_layanan','index')->name('alurlayanans');
        Route::get('/manajemen_alur_layanan/create','create')->name('alurlayanans.create');
        Route::post('/manajemen_alur_layanan','post')->name('alurlayanans.post');
        Route::get('/manajemen_alur_layanan/{alurlayanan}/edit','edit')->name('alurlayanans.edit');
        Route::patch('/manajemen_alur_layanan/{alurlayanan}/update','update')->name('alurlayanans.update');
        Route::delete('/manajemen_alur_layanan/{alurlayanan}/delete','delete')->name('alurlayanans.delete');

        Route::controller(DetailAlurLayananController::class)->prefix('alur_layanan')->group(function() {
            Route::get('{alurlayanan}/detailalurlayanan','index')->name('detailalurlayanans');
            Route::get('{alurlayanan}/detailalurlayanan/create','create')->name('detailalurlayanans.create');
            Route::post('{alurlayanan}/detailalurlayanan','post')->name('detailalurlayanans.post');
            Route::get('{alurlayanan}/edit/{detailalurlayanan}','edit')->name('detailalurlayanans.edit');
            Route::patch('{alurlayanan}/update/{detailalurlayanan}','update')->name('detailalurlayanans.update');
            Route::delete('{alurlayanan}/delete/{detailalurlayanan}','delete')->name('detailalurlayanans.delete');
});

    Route::controller(SyaratPendaftaranController::class)->group(function(){
        Route::get('/manajemen_syarat_pendaftaran','index')->name('syaratpendaftarans');
        Route::get('/manajemen_syarat_pendaftaran/create','create')->name('syaratpendaftarans.create');
        Route::post('/manajemen_syarat_pendaftaran','post')->name('syaratpendaftarans.post');
        Route::get('/manajemen_syarat_pendaftaran/{syaratpendaftaran}/edit','edit')->name('syaratpendaftarans.edit');
        Route::patch('/manajemen_syarat_pendaftaran/{syaratpendaftaran}/update','update')->name('syaratpendaftarans.update');
        Route::delete('/manajemen_syarat_pendaftaran/{syaratpendaftaran}/delete','delete')->name('syaratpendaftarans.delete');
    });
    Route::controller(PendaftarController::class)->group(function(){
        Route::get('/manajemen_pendaftar','index')->name('pendaftars');
        Route::get('/manajemen_pendaftar/create','create')->name('pendaftars.create');
        Route::post('/manajemen_pendaftar','post')->name('pendaftars.post');
        Route::get('/manajemen_pendaftar/{pendaftar}/edit','edit')->name('pendaftars.edit');
        Route::patch('/manajemen_pendaftar/{pendaftar}/update','update')->name('pendaftars.update');
        Route::delete('/manajemen_pendaftar/{pendaftar}/delete','delete')->name('pendaftars.delete');
    });

});
});

