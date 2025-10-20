<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('siswa', \App\Http\Controllers\SiswaController::class);
Route::get('/siswa/create', [\App\Http\Controllers\SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [\App\Http\Controllers\SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/export', [SiswaController::class, 'export'])->name('siswa.export');
Route::get('/siswa/export-pdf', [SiswaController::class, 'exportPdf'])->name('siswa.exportPdf');
Route::post('/siswa/import', [App\Http\Controllers\SiswaController::class, 'import'])->name('siswa.import');


Route::resource('guru', GuruController::class);
