<?php

use App\Http\Controllers\KursusController;
use App\Http\Controllers\MateriController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('index');
    // Kursus Routes
    Route::get('/admin/kursus', [KursusController::class, 'index'])->name('kursus.index');
    Route::post('/admin/kursus', [KursusController::class, 'store'])->name('kursus.store');
    Route::put('/admin/kursus/{id}', [KursusController::class, 'update'])->name('kursus.update');
    Route::delete('/admin/kursus/{id}', [KursusController::class, 'destroy'])->name('kursus.destroy');

    // Materi Routes
    Route::get('/admin/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::post('/admin/materi', [MateriController::class, 'store'])->name('materi.store');
    Route::put('/admin/materi/{id}', [MateriController::class, 'update'])->name('materi.update');
    Route::delete('/admin/materi/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');
});

Auth::routes();
