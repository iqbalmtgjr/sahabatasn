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
        Schema::create('simpan_jawaban_submit', function (Blueprint $table) {
            $table->id();
            $table->string('kode_submit');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('paketsaya_id')->constrained('paket_saya');
            $table->foreignId('banksoal_id')->nullable()->constrained('bank_soal');
            $table->foreignId('togratis_id')->nullable()->constrained('togratis');
            $table->foreignId('jawaban_id')->nullable()->constrained('jawaban');
            $table->foreignId('jawabangratis_id')->nullable()->constrained('jawaban_gratis');
            $table->foreignId('subkategori_id')->constrained('sub_kategori');
            $table->string('jawab')->nullable();
            $table->string('lama_pengerjaaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simpan_jawaban_submit');
    }
};
