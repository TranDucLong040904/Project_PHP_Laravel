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
        Schema::create('bill_ve', function (Blueprint $table) {
            $table->id('IDBILL_VE'); // ID chính
            $table->string('USERNAME', 100);
            $table->decimal('DONGIA', 10, 2)->nullable();
            $table->dateTime('NGAYTAO');
            $table->tinyInteger('PAYMENTSTATUS');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_ve');
    }
};
