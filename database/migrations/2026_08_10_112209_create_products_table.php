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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('name')->nullable();
            $table->string('product_name')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->string('sku')->nullable();
            $table->string('short_description')->nullable();
            $table->string('specification')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('selling_price', 10, 2)->nullable();
            $table->string('discount')->nullable();
            $table->integer('stock')->default(0);
            $table->string('thumbnail')->nullable();
            $table->boolean('status')->default(1);
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
