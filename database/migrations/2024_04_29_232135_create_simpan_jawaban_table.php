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
            $table->foreignId('banksoal_id')->constrained('bank_soal');
            $table->foreignId('subkategori_id')->constrained('sub_kategori');
            $table->foreignId('jawaban_id')->constrained('jawaban');
            $table->string('jawab');
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
