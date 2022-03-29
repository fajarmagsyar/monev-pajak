<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JenisUsahaController;

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


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);

    // JENIS USAHA
    Route::resource('/jenis-usaha', JenisUsahaController::class);
    Route::get('/jenis-usaha/tambah/data', [JenisUsahaController::class, 'tambah']);
});
