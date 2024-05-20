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
        Schema::create('tampung_soal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subpaket_id');
            $table->foreignId('banksoal_id')->nullable();
            $table->foreignId('togratis_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tampung_soal');
    }
};
