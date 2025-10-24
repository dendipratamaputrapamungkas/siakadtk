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
        Schema::create('rpp_asesmens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tema_r_p_m_s_id')->constrained('tema_r_p_m_s')->onDelete('cascade');
            $table->string('jenis', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rpp_asesmens');
    }
};
