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
        Schema::table('phim', function (Blueprint $table) {
            Schema::table('phim', function (Blueprint $table) {
                $table->date('NAMPH')->change(); 
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('phim', function (Blueprint $table) {
            //
        });
    }
};
