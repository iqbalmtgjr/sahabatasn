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
        Schema::create('simpan_jawaban', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('paketsaya_id')->constrained('paket_saya');
            $table->foreignId('banksoal_id')->nullable();
            $table->foreignId('togratis_id')->nullable();
            $table->foreignId('jawaban_id')->nullable();
            $table->foreignId('jawabangratis_id')->nullable();
            $table->foreignId('subkategori_id')->constrained('sub_kategori');
            $table->string('jawab')->nullable();
            $table->string('lama_pengerjakan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simpan_jawaban');
    }
};
