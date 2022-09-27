<?php

use App\Http\Controllers\BantuanController;
use App\Http\Controllers\DetailBantuanController;
use App\Http\Controllers\DetailKeluargaController;
use App\Http\Controllers\JenisBantuanController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\RegisterController;
use App\Models\Bantuan;
use App\Models\DetailBantuan;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('dashboard.dashboard.dashboard', [
        'title' => 'Sinforman | Dashboard',
        'menu' => 'dashboard'
    ]);
})->middleware('auth');

// ROUTE LOGIN & LOGOUT
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// ROUTE REGISTER
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// ROUTE PENDUDUK
Route::resource('/penduduk', PendudukController::class)->middleware('auth');

// ROUTE KELUARGA
Route::resource('/keluarga', KeluargaController::class)->middleware('auth');
Route::get('/anggotaKeluarga/{no_kk}', [KeluargaController::class, 'anggotaKeluarga'])->middleware('auth');

//ROUTE DETAIL KELUARGA
Route::resource('/detailKeluarga', DetailKeluargaController::class)->middleware('auth');

// ROUTE JENIS BANTUAN
Route::resource('/jenisBantuan', JenisBantuanController::class)->middleware('auth');

// ROUTE DETAIL BANTUAN
Route::resource('/detailBantuan', DetailBantuanController::class)->middleware('auth');
