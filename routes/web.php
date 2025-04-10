<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/dashboard', function () {
    return view('contents.dashboard');
})->name('dashboard.index');

Route::get('/beranda', function () {
    return view('contents.beranda');
})->name('beranda.index');

Route::get('/tentang/sejarah', function () {
    return view('contents.sejarah');
})->name('sejarah.index');

Route::get('/tentang/tim-manajemen', function () {
    return view('contents.tim-manajemen');
})->name('tim-manajemen.index');
