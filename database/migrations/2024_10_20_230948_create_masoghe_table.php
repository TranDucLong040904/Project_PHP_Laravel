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
        Schema::create('masoghe', function (Blueprint $table) {
            $table->char('IDGHE', 10); // ID của ghế
            $table->char('IDLOAIGHE', 10);
            $table->char('IDPHONGCHIEU', 10);
            $table->primary(['IDGHE', 'IDPHONGCHIEU']); // Khóa chính kết hợp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masoghe');
    }
};
