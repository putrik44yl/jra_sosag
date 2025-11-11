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
    Schema::create('keuangans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // relasi ke tabel users
        $table->decimal('jumlah', 12, 2); // nominal uang
        $table->string('keterangan')->nullable();
        $table->date('tanggal');
        $table->enum('status', ['Lunas', 'Belum Lunas'])->default('Belum Lunas');
        $table->timestamps();
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangans');
    }
};
