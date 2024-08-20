<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PaketwisataController;
use Illuminate\Support\Facades\Route;

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



// ======= Auth ======== //
// * Login & Logout * //
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
// * Register
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register-proses', [RegisterController::class, 'store'])->name('register-store');

// ======= User ========
// BERANDA //
Route::get('/', [HomeController::class,'index'])->name('user.index');
Route::get('cek-jadwal', [HomeController::class,'cekJadwal'])->name('cek-jadwal');


// PENCARIAN //
Route::middleware(['auth'])->group(function () {

    // PAKET WISATA //
    Route::get('wisata', [WisataController::class,'index'])->name('wisata.index');
    Route::get('wisata/{id}', [WisataController::class,'show'])->name('wisata.detail');
    Route::get('form/{id}', [WisataController::class,'form'])->name('wisata.form');

    //Filter (Algoritma Selection Sort)
    Route::get('filterwisata', [WisataController::class,'filter'])->name('wisata.filter');


    // RESERVASI //
    Route::post('pesan/{id}', [PesananController::class, 'store'])->name('pesanan.store');


    // Pembayaran
    Route::get('pembayaran/{id}', [PembayaranController::class, 'index'])->name('pembayaran.index')->middleware('pembayaran');
    Route::delete('pembayaran/{id}', [PesananController::class, 'destroy'])->name('pembayaran.destroy');

});
// After Pembayaran
Route::middleware('auth')->group(function(){
    Route::get('sukses', [PembayaranController::class, 'prosesbayar'])->name('proses.bayar');
});



// Rating
Route::get('rating', [RatingController::class, 'index'])->name('rating.index');
Route::post('rating/{id}', [RatingController::class, 'store'])->name('rating.simpan');

// BLOG //
Route::get('userblog', [UserBlogController::class,'index'])->name('user.blog');
Route::get('userblog/show/{id}', [UserBlogController::class,'show'])->name('blog.detail');

// TENTANG //
Route::get('tentang', [TentangController::class,'index'])->name('tentang.index');


// ======= Admin ========
// Route::group(['prefix' => 'admin','middleware' => ['auth']], function(){

Route::middleware(['admin'])->group(function () {
    // * Route Dashboard*
    Route::get('profil', [ProfilController::class, 'index'])->name('profil.index');

    // * Route Dashboard*
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // * Route Paket Wisata*
    Route::get('paketwisata', [PaketwisataController::class, 'index'])->name('paketwisata.index');
    Route::get('paketwisata/create', [PaketwisataController::class, 'create'])->name('paketwisata.create');
    Route::post('paketwisata', [PaketwisataController::class, 'store'])->name('paketwisata.store');
    Route::get('paketwisata/edit/{id}', [PaketwisataController::class, 'edit'])->name('paketwisata.edit');
    Route::put('paketwisata/update/{id}', [PaketwisataController::class, 'update'])->name('paketwisata.update');
    Route::delete('paketwisata/{id}', [PaketwisataController::class,'destroy'])->name('paketwisata.delete');

    // * Route Pesanan*
    Route::get('daftarpesanan', [PesananController::class, 'index'])->name('daftarpesanan.index');
    Route::get('filterpesanan', [PesananController::class,'filter'])->name('pesanan.filter');
    Route::get('daftarpesanan/{id}', [PesananController::class, 'detail'])->name('pesanan.detail');

    // * Antrian
    Route::get('antrian', [AntrianController::class, 'index'])->name('antrian.index');
    Route::get('filterantrian', [AntrianController::class, 'filter'])->name('antrian.filter');


    // * Blog
    Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('blog/tambah', [BlogController::class, 'create'])->name('blog.create');
    Route::post('blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('blog/update/{id}', [BlogController::class, 'destroy'])->name('blog.delete');

    // Pengguna
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('pengguna', [UserController::class, 'index'])->name('pengguna.index');
    Route::delete('pengguna/{id}', [UserController::class, 'destroy'])->name('pengguna.delete');

    // Statistik
    Route::get('statistik', [StatistikController::class, 'index'])->name('statistik.index');
});
