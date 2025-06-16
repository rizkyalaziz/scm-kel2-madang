<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DatabarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/manager', function () {
    return view('/manager');
});

Route::get('/kategori', function () {
    return view('kategori');
});

Route::get('/jenis', function () {
    return view('jenis');
});

Route::get('/satuan', function () {
    return view('/satuan');
});

Route::get('/tambahbarang', function () {
    return view('/tambahbarang');
});

Route::get('/tambah-jenis', function () {
    return view('/tambah-jenis');
});

Route::get('/tambah-kategori', function () {
    return view('/tambah-kategori');
});

Route::get('/tambah-satuan', function () {
    return view('/tambah-satuan');
});

Route::get('/barangmasuk', function () {
    return view('/barangmasuk');
});

Route::get('/barangkeluar', function () {
    return view('/barangkeluar');
});


Route::resource('satuan', SatuanController::class)->except(['show', 'create', 'edit']);
Route::resource('jenis', JenisController::class)->except(['show', 'create', 'edit']);
Route::resource('kategori', KategoriController::class)->except(['show', 'create', 'edit']);
Route::resource('databarang', DatabarangController::class)->except(['show', 'create', 'edit']);
Route::resource('barangmasuk', BarangMasukController::class);
Route::resource('barangkeluar', BarangKeluarController::class);

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('logout', [SesiController::class, 'logout']);
});



Route::get('/tambahmasuk', function () {
    return view('/tambahmasuk');
});

Route::get('/laporan-masuk', function () {
    return view('/laporan-masuk');
});

Route::get('/tambahkeluar', function () {
    return view('/tambahkeluar');
});

Route::get('/laporan-keluar', function () {
    return view('/laporan-keluar');
});

Route::get('/returbarang', function () {
    return view('/returbarang');
});

Route::get('/tambahretur', function () {
    return view('/tambahretur');
});

Route::get('/akun', function () {
    return view('/akun');
});

Route::get('/exp', function () {
    return view('/exp');
});

Route::get('/exptambah', function () {
    return view('/exptambah');
});

Route::get('/supplierdata', function () {
    return view('/supplierdata');
});

Route::get('/suppliertambah', function () {
    return view('/suppliertambah');
});

Route::get('/laporan-retur', function () {
    return view('/laporan-retur');
});

Route::get('/dbmanager', function () {
    return view('/dbmanager');
});

Route::get('/suppliermanager', function () {
    return view('/suppliermanager');
});

Route::get('/masuk-mg', function () {
    return view('/masuk-mg');
});

Route::get('/keluar-mg', function () {
    return view('/keluar-mg');
});

Route::get('/returmg', function () {
    return view('/returmg');
});