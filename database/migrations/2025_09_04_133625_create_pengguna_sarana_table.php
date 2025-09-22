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
        Schema::create('pengguna_sarana', function (Blueprint $table) {
            $table->id('id_pengguna'); 
            $table->unsignedBigInteger('id_anggota'); 
            $table->unsignedBigInteger('id_sarana'); 
            $table->date('tanggal_pakai');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            
            $table->foreign('id_anggota')
                  ->references('id_anggota')
                  ->on('anggota_jra')
                  ->onDelete('cascade');

            
            $table->foreign('id_sarana')
                  ->references('id_sarana')
                  ->on('sarana')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna_sarana');
    }
};
