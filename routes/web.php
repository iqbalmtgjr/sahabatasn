<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/master', function () {
    return view('layouts.master');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// profile
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
Route::get('/password', [ProfilController::class, 'password'])->name('password');
Route::post('/password/update', [ProfilController::class, 'updatePassword'])->name('update.password');
