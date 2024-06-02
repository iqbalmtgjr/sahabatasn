<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::controller(GoogleController::class)->group(function () {
//     Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
//     Route::get('auth/google/callback', 'handleGoogleCallback');
// });
