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
        Schema::create('hasil_bobots', function (Blueprint $table) {
            $table->id();
            $table->string('id_siswa');
            $table->string('kd_ekskul');
            $table->float('bobot_tinggi');
            $table->float('bobot_berat');
            $table->float('bobot_riwayat');
            $table->float('bobot_minat');
            $table->float('bobot_riwayat_ekskul');
            $table->float('bobot_prestasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_bobots');
    }
};
