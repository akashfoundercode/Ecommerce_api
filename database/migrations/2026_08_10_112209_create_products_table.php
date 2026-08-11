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
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->string('image')->nullable();
            $table->string('slug');
            $table->string('sku');
            $table->string('short_description');
            $table->string('specification');
            $table->decimal('price', 10, 2);
            $table->decimal('selling_price');
            $table->string('discount');
            $table->integer('stock');
            $table->string('thumbnail');
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
