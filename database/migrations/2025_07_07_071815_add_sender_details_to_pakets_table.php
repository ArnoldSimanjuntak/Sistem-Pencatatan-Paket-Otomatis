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
        Schema::table('pakets', function (Blueprint $table) {
            // Tambahkan dua kolom ini setelah kolom 'nama_pengirim'
            $table->string('kontak_pengirim')->nullable()->after('nama_pengirim');
            $table->text('alamat_pengirim')->nullable()->after('kontak_pengirim');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pakets', function (Blueprint $table) {
            //
        });
    }
};
