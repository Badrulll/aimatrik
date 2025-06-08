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
        Schema::create('question_answer_praktiks', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('question_answer_bid_praktik_id')->references('id')->on('question_answer_bid_praktiks')->cascadeOnDelete();
            $table->foreignUlid('praktik_id')->references('id')->on('praktiks')->cascadeOnDelete();
            $table->string('answer')->nullable();
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_answer_praktiks');
    }
};
