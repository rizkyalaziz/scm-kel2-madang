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
use App\Http\Controllers\DataSuplierController;


Route::get('/welcome', function () {
    return view('welcome');
});

// Route dashboard diarahkan ke AdminController@index agar data dashboard tampil
Route::get('/dashboard', [AdminController::class, 'index']);

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
Route::apiResource('data-supliers', DataSuplierController::class);

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

Route::get('/laporan-masuk', [App\Http\Controllers\BarangMasukController::class, 'laporan'])->name('laporan-masuk');

Route::get('/tambahkeluar', function () {
    return view('/tambahkeluar');
});

Route::get('/laporan-keluar', function () {
    return view('/laporan-keluar');
});

Route::get('/returbarang', [App\Http\Controllers\ReturBarangController::class, 'index'])->name('returbarang');
Route::post('/returbarang', [App\Http\Controllers\ReturBarangController::class, 'store'])->name('returbarang.store');

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

Route::get('/laporan-retur', function () {
    return view('/laporan-retur');
});


Route::get('/supplierdata', [DataSuplierController::class, 'index'])->name('supplierdata');
Route::post('/data-supliers', [DataSuplierController::class, 'store'])->name('data-supliers.store');
Route::put('/data-supliers/{id}', [DataSuplierController::class, 'update'])->name('data-supliers.update');
Route::delete('/data-supliers/{id}', [DataSuplierController::class, 'destroy'])->name('data-supliers.destroy');
Route::get('/laporan-masuk/export-excel', [App\Http\Controllers\BarangMasukController::class, 'exportExcel'])->name('laporan-masuk.export-excel');
