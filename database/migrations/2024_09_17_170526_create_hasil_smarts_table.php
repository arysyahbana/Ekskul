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
        Schema::create('hasil_smarts', function (Blueprint $table) {
            $table->id();
            $table->string('id_siswa');
            $table->string('id_hasil_bobot_total');
            $table->decimal('hasil_smart');
            $table->string('id_ekskul');
            // $table->string('id_ekskul_dipilih')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_smarts');
    }
};
