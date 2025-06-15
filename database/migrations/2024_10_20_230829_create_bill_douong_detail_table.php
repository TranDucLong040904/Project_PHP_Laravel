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
        Schema::create('bill_douong_detail', function (Blueprint $table) {
            $table->integer('IDBILL_DOUONG');
            $table->integer('IDDOUONG');
            $table->integer('SOLUONG');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_douong_detail');
    }
};
