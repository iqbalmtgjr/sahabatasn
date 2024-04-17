<?php

use App\Models\Paket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BanksoalController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PaketsayaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PusatlanggananController;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

// Login Google
Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

//dashboard
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// profile
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
Route::get('/password', [ProfilController::class, 'password'])->name('password');
Route::post('/password/update', [ProfilController::class, 'updatePassword'])->name('update.password');

//pembayaran bisa semua role
Route::get('/pembayaran/getdata/{id}', [PembayaranController::class, 'getdata'])->name('getdatapembayaran');
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');


//hanya admin
Route::middleware(['checkRole:admin'])->group(function () {
    //Kelola_user
    Route::get('/kelola-user', [UserController::class, 'index'])->name('kelola-user');
    Route::get('/user/getdata/{id}', [UserController::class, 'getdata'])->name('getdatauser');
    Route::post('/user/input', [UserController::class, 'store'])->name('user-input');
    Route::post('/user/update', [UserController::class, 'update'])->name('user-update');
    Route::get('/user/hapus/{id}', [UserController::class, 'destroy'])->name('user-delete');

    //Kelola_pengumuman
    Route::get('/pengumuman/getdata/{id}', [PengumumanController::class, 'getdata'])->name('getdatapengumuman');
    Route::post('/pengumuman/input', [PengumumanController::class, 'store'])->name('pengumuman-input');
    Route::post('/pengumuman/update', [PengumumanController::class, 'update'])->name('pengumuman-update');
    Route::get('/pengumuman/hapus/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman-delete');

    //kelola_kategori_paket
    Route::get('/kelola-kategori', [KategoriController::class, 'index'])->name('kelola-kategori');
    Route::get('/kategori/getdata/{id}', [KategoriController::class, 'getdata'])->name('getdatakategori');
    Route::get('/kategori/getdatasub/{id}', [KategoriController::class, 'getdatasub'])->name('getdatasubkategori');
    Route::post('/kategori/input', [KategoriController::class, 'store'])->name('kategori-input');
    Route::post('/kategori/update', [KategoriController::class, 'update'])->name('kategori-update');
    Route::post('/kategori/sub', [KategoriController::class, 'sub'])->name('kategori-sub');
    Route::get('/kategori/hapus/{id}', [KategoriController::class, 'destroy'])->name('kategori-delete');
    Route::get('/kategori/hapusSubKategori/{id}', [KategoriController::class, 'destroySubKategori'])->name('subkategori-delete');

    //kelola_bank_soal
    Route::get('/bank-soal', [BanksoalController::class, 'index']);
    Route::get('/banksoal/getdata/{id}', [BanksoalController::class, 'getdata']);
    Route::post('/bank-soal/input', [BanksoalController::class, 'store']);
    Route::post('/banksoal/update', [BanksoalController::class, 'update']);
    Route::get('/banksoal/edit/{id}', [BanksoalController::class, 'edit']);
    Route::get('/banksoal/hapus/{id}', [BanksoalController::class, 'destroy']);

    //kelola_paket
    Route::get('/kelola-paket', [PaketController::class, 'index'])->name('kelola-paket');
    Route::post('/paket/input', [PaketController::class, 'store'])->name('paket-input');
    Route::get('/paket/getdata/{id}', [PaketController::class, 'getdata'])->name('getdatapaket');
    Route::post('/paket/update', [PaketController::class, 'update'])->name('paket-update');
    Route::get('/paket/hapus/{id}', [PaketController::class, 'destroy'])->name('paket-delete');

    //pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::post('/pembayaran/valid', [PembayaranController::class, 'validasi'])->name('pembayaran-valid');
});

//hanya user
Route::middleware(['checkRole:user'])->group(function () {
    //keranjang
    Route::get('/keranjang/{id}', [KeranjangController::class, 'index'])->name('keranjang');
    Route::get('/keranjang/getdata/{id}', [KeranjangController::class, 'getdata'])->name('getdatakeranjang');
    Route::get('/keranjang/hapus/{id}', [KeranjangController::class, 'destroy'])->name('keranjang-delete');

    //paket_saya
    Route::get('/paketsaya', [PaketsayaController::class, 'index'])->name('paket-saya');
    Route::get('/kerjakan', [PaketsayaController::class, 'kerjakan'])->name('kerjakan');

    //pembayaran
    Route::get('/invoice', [PembayaranController::class, 'invoice'])->name('invoice');
    Route::post('/pembayaran/input', [PembayaranController::class, 'store'])->name('pembayaran-input');
    Route::post('/pembayaran/update', [PembayaranController::class, 'update'])->name('pembayaran-edit');

    //faq
    Route::get('/faq', [FaqController::class, 'index'])->name('faq');

    //pusat langganan
    Route::get('/pusatlangganan', [PusatlanggananController::class, 'index'])->name('pusatlangganan');

    //s&k
    Route::get('/sk', [SkController::class, 'index'])->name('sk');
});
