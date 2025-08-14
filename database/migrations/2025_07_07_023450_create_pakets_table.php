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
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penerima');
            $table->string('nama_pengirim');
            $table->string('ekspedisi')->nullable();
            $table->timestamp('waktu_tiba');
            $table->string('status')->default('Di Resepsionis'); // 'Di Resepsionis' atau 'Sudah Diambil'
            $table->timestamp('waktu_diambil')->nullable();
            $table->string('nama_pengambil')->nullable();
            $table->timestamps(); // membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};
