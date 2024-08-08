<?php

use App\Http\Controllers\KursusController;
use App\Http\Controllers\MateriController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('index');

// rute kursus
route::get('/admin/kursus', [KursusController::class,'index'])->name('kursus.index');
route::post('/admin/kursus', [KursusController::class,'store'])->name('kursus.store');
route::put('/admin/kursus{id}', [KursusController::class,'update'])->name('kursus.update');
route::delete('/admin/kursus{id}', [KursusController::class,'destroy'])->name('kursus.destroy');

Route::get('/admin/materi',[MateriController::class, 'index'])->name('materi.index');
route::post('/admin/materi', [MateriController::class,'store'])->name('materi.store');
route::put('/admin/materi{id}', [MateriController::class,'update'])->name('materi.update');
route::delete('/admin/materi{id}', [MateriController::class,'destroy'])->name('materi.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
