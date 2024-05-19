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
        Schema::create('togratis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id');
            $table->foreignId('subkategori_id');
            $table->longText('soal')->max(10000);
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('togratis');
    }
};
