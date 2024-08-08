<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KursusController;
use App\Http\Controllers\Api\MateriController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('kursus', KursusController::class);
Route::resource('materi', MateriController::class);

