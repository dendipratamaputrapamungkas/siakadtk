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
    //     Schema::create('rpp_tujuans', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }

    public function up(): void
    {
        Schema::create('rpp_tujuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tema_r_p_m_s_id')->constrained('tema_r_p_m_s')->onDelete('cascade');
            $table->text('tujuan');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rpp_tujuans');
    }
};
