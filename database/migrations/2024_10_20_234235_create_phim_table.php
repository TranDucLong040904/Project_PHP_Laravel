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
        Schema::create('phim', function (Blueprint $table) {
            $table->integer('IDPHIM')->primary(); // ID chính
            $table->string('TENPHIM', 50);
            $table->char('IDTHELOAI', 10);
            $table->integer('THOILUONG');
            $table->string('DAODIEN', 50)->nullable();
            $table->integer('NAMPH');
            $table->string('POSTER', 100)->nullable();
            $table->text('DESCRIP')->nullable();
            $table->string('DIENVIEN', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phim');
    }
};
