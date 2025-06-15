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
            $table->increments('IDBILL_DOUONG'); // Khóa chính tự tăng
            $table->unsignedInteger('IDDOUONG'); // Khóa ngoại tương thích với int(11) trong bảng douong
            $table->string('name', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci'); // Khóa ngoại từ bảng users
            $table->decimal('DONGIA', 10, 2); // Giá
            $table->integer('SOLUONG'); // Số lượng
            $table->timestamp('NGAYTAO')->useCurrent(); // Ngày tạo tự động
            $table->string('PAYMENTSTATUS', 20)->charset('utf8mb4')->collation('utf8mb4_unicode_ci'); // Trạng thái thanh toán

            // Khóa ngoại tham chiếu
            $table->foreign('IDDOUONG')->references('IDDOUONG')->on('douong')->onDelete('cascade');
            $table->foreign('name')->references('name')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
