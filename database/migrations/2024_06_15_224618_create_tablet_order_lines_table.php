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
        Schema::create('tablet_order_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tablet_order_id');
            $table->unsignedBigInteger('dish_id');
            $table->unsignedInteger('quantity');
            $table->decimal('price');

            $table->foreign('tablet_order_id')->references('id')->on('tablet_orders');
            $table->foreign('dish_id')->references('id')->on('dishes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tablet_order_lines');
    }
};
