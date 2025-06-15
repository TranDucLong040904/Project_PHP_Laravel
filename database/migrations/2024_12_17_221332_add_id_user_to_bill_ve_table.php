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
        Schema::table('bill_ve', function (Blueprint $table) {
            $table->bigInteger('ID_USER')->unsigned()->after('IDBILL_VE')->nullable();
            $table->foreign('ID_USER')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bill_ve', function (Blueprint $table) {
            //
        });
    }
};
