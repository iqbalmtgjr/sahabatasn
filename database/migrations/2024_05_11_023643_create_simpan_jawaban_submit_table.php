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
            $table->foreignId('user_id');
            $table->foreignId('paketsaya_id');
            $table->foreignId('subpaket_id');
            $table->foreignId('banksoal_id')->nullable();
            $table->foreignId('togratis_id')->nullable();
            $table->foreignId('jawaban_id')->nullable();
            $table->foreignId('jawabangratis_id')->nullable();
            $table->foreignId('subkategori_id');
            $table->string('jawab')->nullable();
            $table->string('lama_pengerjaan')->nullable();
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
