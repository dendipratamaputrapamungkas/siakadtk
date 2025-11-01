<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('capaian_nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->cascadeOnDelete();
            $table->foreignId('guru_id')->constrained('gurus')->cascadeOnDelete();
            $table->foreignId('tema_r_p_m_s_id')->constrained('tema_r_p_m_s')->cascadeOnDelete();
            $table->string('aspek_perkembangan')->nullable(); // Misal: Nilai Agama, Sosial Emosional, Kognitif, Bahasa, Motorik
            $table->string('capaian')->nullable(); // Judul capaian (contoh: Mengenal bentuk huruf)
            $table->enum('kategori_nilai', ['BB', 'MB', 'BSH', 'BSB'])->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('capaian_nilais');
    }
};