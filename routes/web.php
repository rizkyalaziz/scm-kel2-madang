<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/databarang', function () {
    return view('databarang');
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