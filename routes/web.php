<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PencapaianMingguanController;
use App\Http\Controllers\PembayaranSppController;
use App\Http\Controllers\PendaftaranController;

Route::get("/", function () {
    return view("welcome");
});

Route::get("/dashboard", [
    App\Http\Controllers\DashboardController::class,
    "index",
])->name("dashboard");

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

Route::resource("guru", GuruController::class);

Route::resource("pencapaian", PencapaianMingguanController::class);

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
