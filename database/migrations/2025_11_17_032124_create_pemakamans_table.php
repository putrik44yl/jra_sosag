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
    Schema::create('pemakaman', function (Blueprint $table) {
        $table->id();
        $table->string('blok');
        $table->string('nama_almarhum');
        $table->string('tempat_tanggal_lahir');
        $table->date('tanggal_meninggal');
        $table->string('keluarga_almarhum')->nullable();
        $table->text('keterangan')->nullable();

        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemakamans');
    }
};
