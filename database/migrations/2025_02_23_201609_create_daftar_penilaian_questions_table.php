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
        Schema::create('daftar_penilaian_questions', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('daftar_penilaian_id')->references('id')->on('daftar_penilaians')->cascadeOnDelete();
            $table->foreignUlid('domain_id')->references('id')->on('domains')->cascadeOnDelete();
            $table->boolean('is_completed_answer')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_penilaian_questions');
    }
};
