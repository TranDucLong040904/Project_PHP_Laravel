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
        Schema::create('douong', function (Blueprint $table) {
            $table->id('IDDOUONG'); // ID chính
            $table->string('TENDOUONG', 100);
            $table->decimal('DONGIA', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('douong');
    }
};
