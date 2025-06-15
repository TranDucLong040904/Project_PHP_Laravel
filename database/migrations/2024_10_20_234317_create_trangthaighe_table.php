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
        Schema::create('trangthaighe', function (Blueprint $table) {
            $table->char('IDLICHCHIEU', 10);
            $table->char('IDGHE', 10);
            $table->char('IDPHONGCHIEU', 10);
            $table->tinyInteger('STATUS')->default(0); // Trạng thái với giá trị mặc định là 0

            // Khóa chính kết hợp
            $table->primary(['IDLICHCHIEU', 'IDGHE', 'IDPHONGCHIEU']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trangthaighe');
    }
};
