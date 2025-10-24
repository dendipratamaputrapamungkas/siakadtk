<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('tema_r_p_m_s', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('jdl_tematik_rpm');
    //         $table->string('')
    //         $table->timestamps();
    //     });
        
    // }
    public function up(): void
    {
        Schema::create('tema_r_p_m_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id')->constrained('gurus')->cascadeOnDelete();
            $table->foreignId('kelas_id')->constrained('kelas')->cascadeOnDelete();
            $table->string('nama'); // A1, A2, B1, B2
            $table->string('tema', 100);
            $table->date('tanggal');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tema_r_p_m_s');
    }
};
