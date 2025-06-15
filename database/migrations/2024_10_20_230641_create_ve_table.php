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
        Schema::create('ve', function (Blueprint $table) {
            $table->integer('IDVE')->primary(); // Giả sử IDVE là khóa chính
            $table->char('IDGHE', 10);
            $table->char('IDPHONGCHIEU', 10);
            $table->char('IDLICHCHIEU', 10);
            $table->integer('IDBILL_VE');

            // Nếu cần có thêm ràng buộc khóa ngoại, có thể thêm vào đây
            // $table->foreign('IDGHE')->references('id')->on('ghe')->onDelete('cascade');
            // $table->foreign('IDPHONGCHIEU')->references('id')->on('phongchieu')->onDelete('cascade');
            // $table->foreign('IDLICHCHIEU')->references('id')->on('lichchieu')->onDelete('cascade');
            // $table->foreign('IDBILL_VE')->references('id')->on('bill')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('ve');
    }
};
