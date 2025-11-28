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
        Schema::create('anggota_jra', function (Blueprint $table) {
            $table->id('id_anggota'); // Primary Key
            $table->string('nama', 100);
            $table->string('no_telp', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->date('tgl_daftar')->nullable();
            $table->string('bln_daftar', 20)->nullable();
            $table->enum('status_keaktifan', ['aktif', 'nonaktif'])->default('aktif');
            $table->enum('status_keanggotaan', ['baru', 'lama', 'berhenti'])->default('baru');
            $table->string('foto');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_jra');
    }
};
