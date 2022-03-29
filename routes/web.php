<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JenisUsahaController;
use App\Http\Controllers\UsahaController;
use App\Http\Controllers\OmsetController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UsersController;


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


Route::get('/', [AdminController::class, 'loginForm']);
Route::post('/auth', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'authenticate']);


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);

    // JENIS USAHA
    Route::resource('/jenis-usaha', JenisUsahaController::class);
    Route::get('/jenis-usaha/tambah/data', [JenisUsahaController::class, 'tambah']);
    Route::resource('/owner', UsersController::class);

    // USAHA
    Route::resource('/usaha', UsahaController::class);

    // OMSET
    Route::resource('/omset', OmsetController::class);
    Route::get('/omset/tambah/data', [OmsetController::class, 'create']);
    Route::get('/omset/edit/data', [OmsetController::class, 'edit']);

    //PAJAK
    Route::get('/riwayat-pajak', [TransaksiController::class, 'riwayatPajak']);
    Route::get('/riwayat-pajak/tambah/{id}', [TransaksiController::class, 'paidPajakForm']);
    Route::get('/riwayat-pajak/detail/{id}/{usaha_id}', [TransaksiController::class, 'detailPajak']);
    Route::post('/riwayat-pajak/store/', [TransaksiController::class, 'paidPajak']);
});
