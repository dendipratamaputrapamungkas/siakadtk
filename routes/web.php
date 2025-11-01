<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PencapaianMingguanController;
use App\Http\Controllers\PembayaranSppController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\TemaRpmController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AbsensiController;



Route::get("/", function () {
    return view("welcome");
});

Route::get("/dashboard", [
    App\Http\Controllers\DashboardController::class,
    "index",
])->name("dashboard");
// SISWA
Route::get("/siswa/export", [SiswaController::class, "export"])->name(
    "siswa.export",
);
Route::get("/siswa/export-pdf", [SiswaController::class, "exportPdf"])->name(
    "siswa.exportPdf",
);
Route::post("/siswa/import", [
    App\Http\Controllers\SiswaController::class,
    "import",
])->name("siswa.import");
Route::get("/siswa/data", [SiswaController::class, "getData"])->name(
    "siswa.data",
);
Route::resource("siswa", \App\Http\Controllers\SiswaController::class);

// GURU
// Route::resource("guru", GuruController::class);
Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
Route::get('/guru/data', [GuruController::class, 'data'])->name('guru.data');
Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store');


Route::resource("pencapaian", PencapaianMingguanController::class);

Route::get('tema-rpm/data', [TemaRpmController::class, 'data'])->name('tema-rpm.data');
Route::resource('tema-rpm', TemaRpmController::class);

//Nilai
Route::prefix('nilai')->group(function() {
    Route::get('/', [NilaiController::class, 'index'])->name('nilai.index');
    Route::get('/kelas/{kelas}', [NilaiController::class, 'kelas'])->name('nilai.kelas');
    Route::get('/create/{tema}', [NilaiController::class, 'create'])->name('nilai.create');
    Route::post('/', [NilaiController::class, 'store'])->name('nilai.store');
});

//absensi
Route::prefix('absensi')->group(function() {
    Route::get('/', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::get('/create', [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('/', [AbsensiController::class, 'store'])->name('absensi.store');
});



Route::resource("spp", PembayaranSppController::class);
Route::get("/spp/export", [
    PembayaranSppController::class,
    "exportExcel",
])->name("spp.export");

Route::get("/pendaftaran", [PendaftaranController::class, "create"])->name(
    "pendaftaran.create",
);
Route::post("/pendaftaran", [PendaftaranController::class, "store"])->name(
    "pendaftaran.store",
);
Route::get("/pendaftaran/success", [
    PendaftaranController::class,
    "success",
])->name("pendaftaran.success");

// admin view
Route::get("/admin/pendaftaran", [PendaftaranController::class, "index"])->name(
    "pendaftaran.index",
);
Route::post("/admin/pendaftaran/{id}/status", [
    PendaftaranController::class,
    "updateStatus",
])->name("pendaftaran.updateStatus");
