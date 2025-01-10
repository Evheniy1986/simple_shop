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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('message')->nullable();
            $table->string('city');
            $table->string('department');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->decimal('total_price');
            $table->enum('payment_method', ['fondy', 'cash']);
            $table->enum('status', ['pending', 'paid', 'completed', 'canceled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
