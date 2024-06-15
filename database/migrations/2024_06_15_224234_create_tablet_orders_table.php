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
        Schema::create('tablet_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tablet_id');
            $table->unsignedBigInteger('round');
            $table->dateTime('order_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tablet_orders');
    }
};
