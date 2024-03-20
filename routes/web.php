<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PusatlanggananController;
use App\Http\Controllers\SkController;
use App\Http\Controllers\PaketController;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

// Login Google
Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// profile
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
Route::get('/password', [ProfilController::class, 'password'])->name('password');
Route::post('/password/update', [ProfilController::class, 'updatePassword'])->name('update.password');

//Kelola_user
Route::get('/kelola-user', [UserController::class, 'index'])->name('kelola-user');
Route::get('/user/getdata/{id}', [UserController::class, 'getdata'])->name('getdatauser');
Route::post('/user/input', [UserController::class, 'store'])->name('user-input');
Route::post('/user/update', [UserController::class, 'update'])->name('user-update');
Route::get('/user/hapus/{id}', [UserController::class, 'destroy'])->name('user-delete');

//faq
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

//pusat langganan
Route::get('/pusatlangganan', [PusatlanggananController::class, 'index'])->name('pusatlangganan');

//s&k
Route::get('/sk', [SkController::class, 'index'])->name('sk');

//kelola_paket
Route::get('/kelola-paket', [PaketController::class, 'index'])->name('kelola-paket');