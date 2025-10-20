<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('siswa', \App\Http\Controllers\SiswaController::class);
Route::get('/siswa/create', [\App\Http\Controllers\SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [\App\Http\Controllers\SiswaController::class, 'store'])->name('siswa.store');
