<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('index');

Route::get('/admin/materi', function () {
    return view('admin.materi.index');
})->name('materi.index');

Route::get('/admin/kursus', function () {
    return view('admin.kursus.index');
})->name('kursus.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
