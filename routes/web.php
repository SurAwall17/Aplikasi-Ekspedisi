<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('index',[
        'title' => 'home'
    ]);
})->middleware('auth');

Route::get('/pengiriman', function () {
    return view('pengiriman',[
        'title' => 'pengiriman'
    ]);
});

Route::get('/form-pengiriman', function () {
    return view('form-pengiriman',[
        'title' => 'pengiriman'
    ]);
});

Route::get('/notifikasi', function () {
    return view('notifikasi',[
        'title' => 'notifikasi'
    ]);
});

Route::get('/profile/{id}', [ProfileController::class, 'profile']);
Route::put('/profile/update', [ProfileController::class, 'updateProfile']);