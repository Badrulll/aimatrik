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
        Schema::create('question_answer_bid_kapabilitas', function (Blueprint $table) {
            $table->ulid('id')->primary();

            // buat kolom ULID dulu tanpa foreign key
            $table->ulid('daftar_penilaian_question_id');
            // lalu set foreign key dengan nama constraint custom
            $table->foreign('daftar_penilaian_question_id', 'fk_dafpenques_quesansbidkab')
                ->references('id')
                ->on('daftar_penilaian_questions')
                ->cascadeOnDelete();

            // kolom kedua
            $table->ulid('bidang_kapabilitas_id');
            $table->foreign('bidang_kapabilitas_id', 'fk_bidkab_quesanbidkab')
                ->references('id')
                ->on('bidang_kapabilitas')
                ->cascadeOnDelete();

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
        Schema::dropIfExists('question_answer_bid_kapabilitas');
    }
};
