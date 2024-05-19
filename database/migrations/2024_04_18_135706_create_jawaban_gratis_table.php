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
        Schema::create('jawaban_gratis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('togratis_id');
            $table->string('pilihan_a');
            $table->string('pilihan_b');
            $table->string('pilihan_c');
            $table->string('pilihan_d');
            $table->string('pilihan_e')->nullable();
            $table->smallInteger('jawaban_a');
            $table->smallInteger('jawaban_b');
            $table->smallInteger('jawaban_c');
            $table->smallInteger('jawaban_d');
            $table->smallInteger('jawaban_e')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_gratis');
    }
};
