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
        Schema::create('pemulasaraan', function (Blueprint $table) {
            $table->id('id_pemulasaraan'); // Primary Key
            $table->string('nama_almarhum', 150);
            $table->date('tgl_permintaan');
            $table->date('tgl_pemulasaraan')->nullable();
            $table->enum('status', ['menunggu', 'berjalan', 'selesai', 'dibatalkan'])->default('menunggu');
            $table->string('lokasi', 200)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemulasaraan');
    }
};
