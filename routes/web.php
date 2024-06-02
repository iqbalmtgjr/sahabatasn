<?php

use App\Models\Paket;
use App\Livewire\Kerjakan;
use App\Livewire\Pembahasan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BanksoalController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SubpaketController;
use App\Http\Controllers\TogratisController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PaketsayaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\HasiltryoutController;
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
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// profile
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
Route::get('/password', [ProfilController::class, 'password'])->name('password');
Route::post('/password/update', [ProfilController::class, 'updatePassword'])->name('update.password');

//pembayaran bisa semua role
Route::get('/pembayaran/getdata/{id}', [PembayaranController::class, 'getdata'])->name('getdatapembayaran');
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');

//faq
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

//pusat langganan
Route::get('/pusatlangganan', [PusatlanggananController::class, 'index'])->name('pusatlangganan');
Route::get('/pusatlangganan/detailcpns', [PusatlanggananController::class, 'detail'])->name('detailcpns');
Route::get('/pusatlangganan/detailskd', [PusatlanggananController::class, 'detailskd'])->name('detailskd');
Route::get('/pusatlangganan/detailskb', [PusatlanggananController::class, 'detailskb'])->name('detailskb');
Route::get('/pusatlangganan/detailpppk', [PusatlanggananController::class, 'detailpppk'])->name('detailpppk');
Route::get('/pusatlangganan/detailpppkteknis', [PusatlanggananController::class, 'detailpppkteknis'])->name('detailpppkteknis');
Route::get('/pusatlangganan/detailpppkumum', [PusatlanggananController::class, 'detailpppkumum'])->name('detailpppkumum');

//s&k
Route::get('/sk', [SkController::class, 'index'])->name('sk');

//ourteam
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('tentang');

Route::group(['middleware' => ['isLogin']], function () {
    //hanya admin
    Route::middleware(['checkRole:admin'])->group(function () {
        //kelola_promo
        Route::get('/promo', [PromoController::class, 'index'])->name('promo');
        Route::get('/promo/getdata/{id}', [PromoController::class, 'getdata'])->name('getdatapromo');
        Route::post('/promo/input', [PromoController::class, 'store'])->name('promo-input');
        Route::post('/promo/update', [PromoController::class, 'update'])->name('promo-update');
        Route::get('/promo/hapus/{id}', [PromoController::class, 'destroy'])->name('promo-delete');
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
        Route::get('/bank-soal', [BanksoalController::class, 'index'])->name('bank-soal');
        Route::get('/banksoal/getdata/{id}', [BanksoalController::class, 'getdata']);
        Route::post('/bank-soal/input', [BanksoalController::class, 'store']);
        Route::post('/banksoal/update', [BanksoalController::class, 'update']);
        Route::get('/bank-soal/edit/{id}', [BanksoalController::class, 'edit']);
        Route::get('/banksoal/hapus/{id}', [BanksoalController::class, 'destroy']);

        //kelola_tryout_gratis
        Route::get('/tryout-gratis', [TogratisController::class, 'index']);
        Route::get('/tryout-gratis/getdata/{id}', [TogratisController::class, 'getdata']);
        Route::post('/tryout-gratis/input', [TogratisController::class, 'store']);
        Route::post('/tryout-gratis/update', [TogratisController::class, 'update']);
        Route::get('/tryout-gratis/hapus/{id}', [TogratisController::class, 'destroy']);

        //kelola_paket
        Route::get('/paket/utama', [PaketController::class, 'index'])->name('paket.utama');
        Route::get('/paket/utama/sub/{id}', [PaketController::class, 'sub'])->name('paket.sub.utama');
        Route::get('/paket/utama/sub/hapus/{id}', [PaketController::class, 'subhapus'])->name('paket.sub.hapus');
        Route::post('/paket/utama/sub', [PaketController::class, 'subpost'])->name('paket.sub.post');
        Route::post('/paket/input', [PaketController::class, 'store'])->name('paket-input');
        Route::get('/paket/getdata/{id}', [PaketController::class, 'getdata'])->name('getdatapaket');
        Route::post('/paket/update', [PaketController::class, 'update'])->name('paket-update');
        Route::get('/paket/hapus/{id}', [PaketController::class, 'destroy'])->name('paket-delete');

        //kelola_subpaket
        Route::get('/paket/sub', [SubpaketController::class, 'index'])->name('paket.sub');
        Route::post('/subpaket/input', [SubpaketController::class, 'store'])->name('subpaket.input');
        Route::get('/subpaket/getdata/{id}', [SubpaketController::class, 'getdata'])->name('getdatasubpaket');
        Route::post('/subpaket/update', [SubpaketController::class, 'update'])->name('subpaket.update');
        Route::get('/subpaket/hapus/{id}', [SubpaketController::class, 'destroy'])->name('subpaket.delete');
        Route::get('/subpaket/soal/{id}', [SubpaketController::class, 'soal'])->name('subpaket.soal');
        Route::get('/subpaket/soal/hapus/{id}', [SubpaketController::class, 'hapus'])->name('subpaket.hapus');
        Route::post('/subpaket/soal', [SubpaketController::class, 'createsoal'])->name('subpaket.soal.input');

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
        Route::get('/paketsaya/{paket_id}', [PaketsayaController::class, 'subpaket']);
        Route::get('/kerjakan/{paket_id}/{subpaket_id}', Kerjakan::class)->name('kerjakan');
        Route::post('/kerjakan/post', [PaketsayaController::class, 'store'])->name('kerjakan-post');

        Route::get('/togratis', [PaketsayaController::class, 'togratis'])->name('togratis');
        Route::get('/togratis/{paket_id}', [PaketsayaController::class, 'subpaket']);

        //pembayaran
        Route::get('/invoice', [PembayaranController::class, 'invoice'])->name('invoice');
        Route::post('/pembayaran/input', [PembayaranController::class, 'store'])->name('pembayaran-input');
        Route::post('/pembayaran/update', [PembayaranController::class, 'update'])->name('pembayaran-edit');

        //hasil
        // Route::get('/hasil', [HasiltryoutController::class, 'index'])->name('hasil');
        Route::get('/hasil/skd', [HasiltryoutController::class, 'index'])->name('hasil.skd');
        Route::get('/hasil/skb', [HasiltryoutController::class, 'skb'])->name('hasil.skb');
        Route::get('/hasil/pembahasan/skd/{subpaket_id}/{paket_id}/{kode_submit}', Pembahasan::class)->name('pembahasan');
    });
});
