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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku');
            $table->string('penulis');
            $table->unsignedBigInteger('penerbit_id');
            $table->integer('tahun_terbit');
            $table->unsignedBigInteger('kategori_id');
            $table->enum('status', ['aktif','tidak aktif']);
            $table->string('pictures');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
