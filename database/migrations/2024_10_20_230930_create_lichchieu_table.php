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
        Schema::create('lichchieu', function (Blueprint $table) {
            $table->char('IDLICHCHIEU', 10)->primary(); // ID chính
            $table->integer('IDPHIM');
            $table->dateTime('XUATCHIEU');
            $table->char('IDPHONGCHIEU', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lichchieu');
    }
};
