<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DatabarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
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