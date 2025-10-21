<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nisn')->nullable();
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->text('alamat');
            $table->string('asal_sekolah')->nullable();
            $table->enum('status', ['Menunggu Verifikasi', 'Diterima', 'Ditolak'])->default('Menunggu Verifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('pendaftaran');
    }
};
