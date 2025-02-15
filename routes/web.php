<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;

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
    return view('/auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/stok-material', [AdminController::class, 'stok_material']);
    Route::get('/detail-stok-material/{id}', [AdminController::class, 'stok_material_detail']);
    Route::post('/tambah-jenis-material', [AdminController::class, 'tambah_jenis_material']);
    Route::post('/tambah-stok-material', [AdminController::class, 'tambah_stok']);
    Route::post('/ambil-stok-material', [AdminController::class, 'ambil_stok']);
    Route::put('/edit-stok-tambah/{id}', [AdminController::class, 'edit_stok_tambah']);
    Route::put('/edit-stok-ambil/{id}', [AdminController::class, 'edit_stok_ambil']);
    Route::delete('/hapus-stok-tambah/{id}', [AdminController::class, 'hapus_stok_tambah']);
    Route::delete('/hapus-stok-ambil/{id}', [AdminController::class, 'hapus_stok_ambil']);

    Route::get('/stok-bahan', [AdminController::class, 'stok_bahan']);
    Route::get('/detail-stok-bahan/{id}', [AdminController::class, 'stok_bahan_detail']);
    Route::post('/tambah-jenis-bahan', [AdminController::class, 'tambah_jenis_bahan']);
    Route::post('/tambah-stok-bahan', [AdminController::class, 'tambah_stok_bahan']);
    Route::post('/ambil-stok-bahan', [AdminController::class, 'ambil_stok_bahan']);
    Route::put('/edit-stok-tambah-bahan/{id}', [AdminController::class, 'edit_stok_tambah_bahan']);
    Route::put('/edit-stok-ambil-bahan/{id}', [AdminController::class, 'edit_stok_ambil_bahan']);
    Route::delete('/hapus-stok-tambah-bahan/{id}', [AdminController::class, 'hapus_stok_tambah_bahan']);
    Route::delete('/hapus-stok-ambil-bahan/{id}', [AdminController::class, 'hapus_stok_ambil_bahan']);

    Route::get('/stok-tas', [AdminController::class, 'stok_tas']);
    Route::get('/detail-stok-tas/{id}', [AdminController::class, 'stok_tas_detail']);
    Route::post('/tambah-jenis-tas', [AdminController::class, 'tambah_jenis_tas']);
    Route::post('/tambah-stok-tas', [AdminController::class, 'tambah_stok_tas']);
    Route::post('/ambil-stok-tas', [AdminController::class, 'ambil_stok_tas']);
    Route::put('/edit-stok-tambah-tas/{id}', [AdminController::class, 'edit_stok_tambah_tas']);
    Route::put('/edit-stok-ambil-tas/{id}', [AdminController::class, 'edit_stok_ambil_tas']);
    Route::delete('/hapus-stok-tambah-tas/{id}', [AdminController::class, 'hapus_stok_tambah_tas']);
    Route::delete('/hapus-stok-ambil-tas/{id}', [AdminController::class, 'hapus_stok_ambil_tas']);

    Route::get('/laporan', [AdminController::class, 'laporan']);
    Route::get('/cetak-laporan/{tglawal}/{tglakhir}', [AdminController::class, 'cetak_laporan']);

    Route::put('/edit-jenis-material/{id}', [AdminController::class, 'edit_jenis_material']);
    Route::put('/edit-jenis-bahan/{id}', [AdminController::class, 'edit_jenis_bahan']);
    Route::put('/edit-jenis-tas/{id}', [AdminController::class, 'edit_jenis_tas']);
});

Route::middleware(['auth', 'users'])->group(function(){
    Route::get('/dashboard-users', [UsersController::class, 'index'])->name('users.dashboard');
    Route::get('/data-stok-material', [UsersController::class, 'stok_material']);
    Route::get('/detail-data-stok-material/{id}', [UsersController::class, 'stok_material_detail']);
 

    Route::get('/data-stok-bahan', [UsersController::class, 'stok_bahan']);
    Route::get('/detail-data-stok-bahan/{id}', [UsersController::class, 'stok_bahan_detail']);
 

    Route::get('/data-stok-tas', [UsersController::class, 'stok_tas']);
    Route::get('/detail-data-stok-tas/{id}', [UsersController::class, 'stok_tas_detail']);
    
});
