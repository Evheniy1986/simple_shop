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
        Schema::table('subscribtions', function (Blueprint $table) {
            $table->dropColumn('product_id');
            $table->unsignedInteger('sku_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscribtions', function (Blueprint $table) {
            $table->integer('product_id');
            $table->dropColumn('sku_id');
        });
    }
};
