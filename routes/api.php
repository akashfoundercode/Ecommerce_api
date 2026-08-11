<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\CartController;

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
Route::delete('product_variant/{id',[ProductVariantController::class,'destroy']);

Route::get('cart',[CartController::class,'index']);
Route::post('cart', [CartController::class, 'store']);
Route::put('cart/{id}',[CartController::class,'update']);
Route::delete('cart/{id',[CartController::class,'destroy']);