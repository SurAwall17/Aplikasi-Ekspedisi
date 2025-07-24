<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengirimanController;

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

Route::get('/login', [LoginController::class, 'form_login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'form_register']);
Route::post('/register', [RegisterController::class, 'register']);


Route::middleware(['auth','user'])->group(function () {
    Route::get('/', function () {
        return view('index',[
            'title' => 'home'
        ]);
    });
    Route::post('/pembayaran/{id}', [PembayaranController::class, 'pembayaran']);
    Route::get('/notifikasi', [NotifikasiController::class, 'notifikasi']);
    Route::get('/pengiriman', [PengirimanController::class, 'dataPengiriman']);
    Route::get('/form-pengiriman', [PengirimanController::class, 'formPengiriman']);
    Route::post('/tambah-pengiriman', [PengirimanController::class, 'tambahPengiriman']);

    Route::get('/profile/{id}', [ProfileController::class, 'profile']);
    Route::put('/profile/update', [ProfileController::class, 'updateProfile']);

    Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');

});