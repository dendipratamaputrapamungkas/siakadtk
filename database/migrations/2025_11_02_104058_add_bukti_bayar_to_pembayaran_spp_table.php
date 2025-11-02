<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pembayaran_spp', function (Blueprint $table) {
            $table->string('bukti_bayar')->nullable()->after('status');
            $table->enum('status_validasi', ['Menunggu', 'Disetujui', 'Ditolak'])->default('Menunggu')->after('bukti_bayar');
        });
    }

    public function down(): void
    {
        Schema::table('pembayaran_spp', function (Blueprint $table) {
            $table->dropColumn(['bukti_bayar', 'status_validasi']);
        });
    }
};
