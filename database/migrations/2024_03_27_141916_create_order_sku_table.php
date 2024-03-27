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
        Schema::create('order_sku', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('sku_id');
            $table->integer('quantity')->default(0);
            $table->decimal('price', 8,2);
            $table->timestamps();
        });

        Schema::dropIfExists('order_product');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('quantity')->default(0);
            $table->decimal('price', 8,2);
            $table->timestamps();
        });
        Schema::dropIfExists('order_sku');
    }
};
