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
        Schema::create('hasil_bobot_totals', function (Blueprint $table) {
            $table->id();
            // $table->string('id_hasil_bobot');
            $table->float('bobot_tinggi_total')->default(0);
            $table->float('bobot_berat_total')->default(0);
            $table->float('bobot_riwayat_total')->default(0);
            $table->float('bobot_minat_total')->default(0);
            $table->float('bobot_riwayat_ekskul_total')->default(0);
            $table->float('bobot_prestasi_total')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_bobot_totals');
    }
};
