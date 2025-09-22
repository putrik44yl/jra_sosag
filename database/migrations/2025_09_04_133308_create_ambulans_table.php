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
        Schema::create('ambulans', function (Blueprint $table) {
            $table->id('id_ambulans'); 
            $table->unsignedBigInteger('id_anggota'); 
            $table->string('nama', 100);
            $table->string('plat', 20);
            $table->string('tujuan', 150)->nullable();
            $table->enum('status', ['tersedia', 'dipakai', 'rusak'])->default('tersedia');
            $table->timestamps();

           
            $table->foreign('id_anggota')
                  ->references('id_anggota')
                  ->on('anggota_jra')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambulans');
    }
};
