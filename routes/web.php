<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->back();
    }
    return view('layouts.login');
})->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/beranda', function () {
        return view('contents.beranda');
    })->name('beranda.index');

    Route::get('/tentang/sejarah', function () {
        return view('contents.sejarah');
    })->name('sejarah.index');

    Route::get('/tentang/tim-manajemen', function () {
        return view('contents.tim-manajemen');
    })->name('tim-manajemen.index');

    Route::get('/produk', function () {
        return view('contents.produk');
    })->name('produk.index');

    Route::get('/kontak', function () {
        return view('contents.kontak');
    })->name('kontak.index');

    Route::get('/revolusi-rasa', function () {
        return view('contents.revolusi-rasa');
    })->name('revolusi.index');

    Route::get('/informasi', function () {
        return view('contents.informasi');
    })->name('informasi.index');
});

