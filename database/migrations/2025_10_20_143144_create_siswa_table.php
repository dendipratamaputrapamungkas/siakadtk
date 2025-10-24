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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique();
            $table->string('nama_lengkap');
            $table->string('no_kk');
            $table->string('tempatlhr');
            $table->date('tanggal_lhr');
        
            $table->enum('jk', ['L','P']);
            $table->enum('agama', ['Islam','Kristen','Katolik','Hindu','Budha','Konghucu']);
        
            $table->foreignId('kelas_id')->constrained('kelas')->cascadeOnDelete();
            $table->foreignId('rombel_id')->constrained('rombels')->cascadeOnDelete();
        
            $table->string('no_indukpd')->nullable();
            $table->date('tgl_masuk');
        
            $table->text('alamat');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('wali')->nullable();
            $table->string('no_hp')->nullable();
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropColumn([
                'nisn','no_kk','tempatlhr','tanggal_lhr','jk','agama',
                'kelas_id','rombel_id','no_indukpd','tgl_masuk',
                'alamat','nama_ayah','nama_ibu','wali','no_hp'
            ]);
        });
    }
};
