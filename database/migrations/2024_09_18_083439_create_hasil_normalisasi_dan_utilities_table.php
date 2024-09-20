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
        Schema::create('hasil_normalisasi_dan_utilities', function (Blueprint $table) {
            $table->id();
            $table->string('id_siswa');
            $table->string('kd_ekskul');
            $table->string('id_hasil_bobot_total');
            $table->float('normalisasi_tinggi')->nullable();
            $table->float('normalisasi_berat')->nullable();
            $table->float('normalisasi_riwayat')->nullable();
            $table->float('normalisasi_minat')->nullable();
            $table->float('normalisasi_riwayat_ekskul')->nullable();
            $table->float('normalisasi_prestasi')->nullable();
            $table->string('hasil_utilities')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_normalisasi_dan_utilities');
    }
};
