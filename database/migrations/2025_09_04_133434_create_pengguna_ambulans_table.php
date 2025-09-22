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
        Schema::create('pengguna_ambulans', function (Blueprint $table) {
            $table->id('id_pengguna_ambulans'); 
            $table->unsignedBigInteger('id_ambulans');
            $table->foreign('id_ambulans')
                  ->references('id_ambulans')
                  ->on('ambulans')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('id_anggota');
            $table->foreign('id_anggota')
                  ->references('id_anggota')
                  ->on('anggota_jra')
                  ->onDelete('cascade');
            $table->date('tgl_penggunaan');
            $table->string('tujuan', 150)->nullable();
            $table->enum('status', ['menunggu', 'berjalan', 'selesai', 'dibatalkan'])->default('menunggu');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna_ambulans');
    }
};
