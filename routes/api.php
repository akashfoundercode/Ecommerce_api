<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistsController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderitemsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ReviewController;

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile',[AuthController::class,'showProfile']);
    Route::post('profile',[AuthController::class,'profile']);
});

Route::get('categories', [CategoryController::class, 'index']);
Route::post('categories', [CategoryController::class, 'store']);
Route::put('categories/{id}', [CategoryController::class, 'update']);
Route::delete('categories/{id}', [CategoryController::class, 'destroy']);

Route::get('sub-categories',[SubCategoryController::class, 'index']);
Route::post('sub-categories',[SubCategoryController::class, 'store']);
Route::put('sub-categories/{id}',[SubCategoryController::class, 'update']);
Route::delete('sub-categories/{id}',[SubCategoryController::class, 'destroy']);

Route::get('brand',[BrandController::class,'index']);
Route::post('brand',[BrandController::class,'store']);
Route::put('brand/{id}',[BrandController::class,'update']);
Route::delete('brand/{id}',[BrandController::class,'destroy']);

Route::get('products',[ProductController::class,'index']);
Route::post('products',[ProductController::class,'store']);
Route::put('products/{id}',[ProductController::class,'update']);
Route::delete('products/{id}',[ProductController::class,'destroy']);

Route::get('product_variant',[ProductVariantController::class,'index']);
Route::post('product_variant', [ProductVariantController::class, 'store']);
Route::put('product_variant/{id}',[ProductVariantController::class,'update']);
Route::delete('product_variant/{id}',[ProductVariantController::class,'destroy']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('cart', [CartController::class, 'index']);
    Route::post('cart', [CartController::class, 'store']);
    Route::put('cart/{id}', [CartController::class, 'update']);
    Route::delete('cart/{id}', [CartController::class, 'destroy']);
});

Route::get('wishlist',[WishlistsController::class,'index']);
Route::post('wishlist', [WishlistsController::class,'store']);
Route::delete('wishlist/{id}', [WishlistsController::class,'destroy']);    

Route::get('address',[AddressController::class,'index']);
Route::post('address',[AddressController::class,'store']);
Route::put('address/{id}', [AddressController::class, 'update']);
Route::delete('address/{id}',[AddressController::class,'destroy']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('orders', [OrderController::class, 'index']);
    Route::post('orders', [OrderController::class, 'store']);
    Route::get('orders/{id}', [OrderController::class, 'show']);
    Route::put('orders/{id}', [OrderController::class, 'update']);
    Route::delete('orders/{id}', [OrderController::class, 'destroy']);
});

Route::get('order_items',[OrderitemsController::class,'index']);
Route::post('order_items',[OrderitemsController::class,'store']);
Route::delete('order_items/{id}',[OrderitemsController::class,'destroy']);

Route::get('coupons',[CouponController::class,'index']);
Route::post('coupons',[CouponController::class,'store']);
Route::post('coupons/check',[CouponController::class,'check']);
Route::put('coupons/{id}',[CouponController::class,'update']);
Route::delete('coupons/{id}',[CouponController::class,'destroy']);

Route::get('reviews', [ReviewController::class, 'index']);
Route::get('reviews/{id}', [ReviewController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('reviews', [ReviewController::class, 'store']);
    Route::put('reviews/{id}', [ReviewController::class, 'update']);
    Route::delete('reviews/{id}', [ReviewController::class, 'destroy']);
});
