<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'home'])->name('home');

Route::get('admin',[AdminController::class,'index'])->name('admin.index');
Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::get('admin/profile',[AdminController::class,'myprofile'])->name('admin.profile');
Route::get('admin/products',[AdminController::class,'products'])->name('admin.products');
Route::post('admin/products',[AdminController::class,'storeProduct'])->name('admin.products.store');
Route::get('admin/products/{product}/edit',[AdminController::class,'editProduct'])->name('admin.products.edit');
Route::put('admin/products/{product}',[AdminController::class,'updateProduct'])->name('admin.products.update');
Route::delete('admin/products/{product}',[AdminController::class,'destroyProduct'])->name('admin.products.destroy');
