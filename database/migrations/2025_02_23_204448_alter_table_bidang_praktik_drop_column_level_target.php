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
        Schema::table('bidang_praktiks', function (Blueprint $table) {
            $table->dropColumn('level_target');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bidang_praktiks', function (Blueprint $table) {
            $table->tinyInteger('level_target');
        });
    }
};
