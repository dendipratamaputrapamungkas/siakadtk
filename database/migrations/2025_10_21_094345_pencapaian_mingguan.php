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
        Schema::create('pencapaian_mingguan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->string('minggu_ke');
            $table->text('aspek_motorik')->nullable();
            $table->text('aspek_kognitif')->nullable();
            $table->text('aspek_sosial')->nullable();
            $table->text('aspek_bahasa')->nullable();
            $table->text('aspek_agama')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
