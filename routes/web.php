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

Route::get('/sejarah', function () {
    return view('contents.sejarah');
})->name('sejarah.index');
