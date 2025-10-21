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
        Schema::create('pembayaran_spp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->string('bulan');
            $table->year('tahun');
            $table->decimal('jumlah', 10, 2);
            $table->date('tanggal_bayar')->nullable();
            $table->string('status')->default('Belum Lunas'); // Lunas / Belum Lunas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('pembayaran_spp');
    }
};
