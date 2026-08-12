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
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('user_id')->after('id');
            $table->integer('product_id')->after('user_id');
            $table->tinyInteger('rating')->after('product_id');
            $table->text('comment')->nullable()->after('rating');
            $table->boolean('status')->default(1)->after('comment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn([
                'user_id',
                'product_id',
                'rating',
                'comment',
                'status',
            ]);
        });
    }
};
