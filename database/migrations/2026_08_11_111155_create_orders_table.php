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
            $table->unsignedBigInteger('user_id');
            $table->string('order_number');
            $table->string('address_id')->nullable();
            $table->string('subtotal');
            $table->string('discount');
            $table->string('delivery_charge');
            $table->decimal('total_amount', 10, 2);
            $table->string('payment_method');
            $table->string('payment_status');
            $table->string('order_status');
            $table->string('status')->default('pending');
            $table->string('address');
            $table->string('phone');
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
