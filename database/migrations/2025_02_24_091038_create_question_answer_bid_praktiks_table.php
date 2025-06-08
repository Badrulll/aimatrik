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
        Schema::create('question_answer_bid_praktiks', function (Blueprint $table) {
            $table->ulid('id')->primary();

            // Buat kolom dulu
            $table->ulid('question_answer_bid_kapabilitas_id');
            $table->ulid('bidang_praktik_id');

            // Tambahkan foreign key dengan nama constraint yang pendek
            $table->foreign('question_answer_bid_kapabilitas_id', 'fk_qab_prak_kapabilitas')
                ->references('id')
                ->on('question_answer_bid_kapabilitas')
                ->cascadeOnDelete();

            $table->foreign('bidang_praktik_id', 'fk_qab_prak_bidangpraktik')
                ->references('id')
                ->on('bidang_praktiks')
                ->cascadeOnDelete();

            $table->boolean('is_completed_answer')->default(false);
            $table->tinyInteger('level_target')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_answer_bid_praktiks');
    }
};
