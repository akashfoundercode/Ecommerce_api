<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'home'])->name('home');

Route::controller(AdminController::class)
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('login', 'login')->name('login');
        Route::get('profile', 'myprofile')->name('profile');

        Route::get('products', 'products')->name('products');
        Route::post('products', 'storeProduct')->name('products.store');
        Route::get('products/{product}/edit', 'editProduct')->name('products.edit');
        Route::get('products/{product}/delete', 'deleteProduct')->name('products.delete');
        Route::get('products/{product}', 'showProduct')->name('products.show');
        Route::put('products/{product}', 'updateProduct')->name('products.update');
        Route::delete('products/{product}', 'destroyProduct')->name('products.destroy');

        Route::get('categories', 'categories')->name('categories');
        Route::post('categories', 'storeCategory')->name('categories.store');
        Route::get('categories/{category}/edit', 'editCategory')->name('categories.edit');
        Route::get('categories/{category}/delete', 'deleteCategory')->name('categories.delete');
        Route::get('categories/{category}', 'showCategory')->name('categories.show');
        Route::put('categories/{category}', 'updateCategory')->name('categories.update');
        Route::delete('categories/{category}', 'destroyCategory')->name('categories.destroy');

        Route::get('subcategories', 'subcategories')->name('subcategories');
        Route::post('subcategories', 'storeSubcategory')->name('subcategories.store');
        Route::get('subcategories/{subcategory}/edit', 'editSubcategory')->name('subcategories.edit');
        Route::get('subcategories/{subcategory}/delete', 'deleteSubcategory')->name('subcategories.delete');
        Route::get('subcategories/{subcategory}', 'showSubcategory')->name('subcategories.show');
        Route::put('subcategories/{subcategory}', 'updateSubcategory')->name('subcategories.update');
        Route::delete('subcategories/{subcategory}', 'destroySubcategory')->name('subcategories.destroy');

        Route::get('brands', 'brands')->name('brands');
        Route::post('brands', 'storeBrand')->name('brands.store');
        Route::get('brands/{brand}/edit', 'editBrand')->name('brands.edit');
        Route::get('brands/{brand}/delete', 'deleteBrand')->name('brands.delete');
        Route::get('brands/{brand}', 'showBrand')->name('brands.show');
        Route::put('brands/{brand}', 'updateBrand')->name('brands.update');
        Route::delete('brands/{brand}', 'destroyBrand')->name('brands.destroy');

        Route::get('product-images', 'productImages')->name('product-images');
        Route::post('product-images', 'storeProductImage')->name('product-images.store');
        Route::get('product-images/{productImage}/edit', 'editProductImage')->name('product-images.edit');
        Route::get('product-images/{productImage}/delete', 'deleteProductImage')->name('product-images.delete');
        Route::get('product-images/{productImage}', 'showProductImage')->name('product-images.show');
        Route::put('product-images/{productImage}', 'updateProductImage')->name('product-images.update');
        Route::delete('product-images/{productImage}', 'destroyProductImage')->name('product-images.destroy');

        Route::get('product-variants', 'productVariants')->name('product-variants');
        Route::post('product-variants', 'storeProductVariant')->name('product-variants.store');
        Route::get('product-variants/{productVariant}/edit', 'editProductVariant')->name('product-variants.edit');
        Route::get('product-variants/{productVariant}/delete', 'deleteProductVariant')->name('product-variants.delete');
        Route::get('product-variants/{productVariant}', 'showProductVariant')->name('product-variants.show');
        Route::put('product-variants/{productVariant}', 'updateProductVariant')->name('product-variants.update');
        Route::delete('product-variants/{productVariant}', 'destroyProductVariant')->name('product-variants.destroy');

        Route::get('carts', 'carts')->name('carts');
        Route::get('carts/{cart}/edit', 'editCart')->name('carts.edit');
        Route::get('carts/{cart}/delete', 'deleteCart')->name('carts.delete');
        Route::get('carts/{cart}', 'showCart')->name('carts.show');
        Route::put('carts/{cart}', 'updateCart')->name('carts.update');
        Route::delete('carts/{cart}', 'destroyCart')->name('carts.destroy');

        Route::get('wishlists', 'wishlists')->name('wishlists');
        Route::get('wishlists/{wishlist}/edit', 'editWishlist')->name('wishlists.edit');
        Route::get('wishlists/{wishlist}/delete', 'deleteWishlist')->name('wishlists.delete');
        Route::get('wishlists/{wishlist}', 'showWishlist')->name('wishlists.show');
        Route::put('wishlists/{wishlist}', 'updateWishlist')->name('wishlists.update');
        Route::delete('wishlists/{wishlist}', 'destroyWishlist')->name('wishlists.destroy');

        Route::get('addresses', 'addresses')->name('addresses');
        Route::get('addresses/{address}/edit', 'editAddress')->name('addresses.edit');
        Route::get('addresses/{address}/delete', 'deleteAddress')->name('addresses.delete');
        Route::get('addresses/{address}', 'showAddress')->name('addresses.show');
        Route::put('addresses/{address}', 'updateAddress')->name('addresses.update');
        Route::delete('addresses/{address}', 'destroyAddress')->name('addresses.destroy');

        Route::get('orders', 'orders')->name('orders');
        Route::get('orders/{order}/edit', 'editOrder')->name('orders.edit');
        Route::get('orders/{order}/delete', 'deleteOrder')->name('orders.delete');
        Route::get('orders/{order}', 'showOrder')->name('orders.show');
        Route::put('orders/{order}', 'updateOrder')->name('orders.update');
        Route::delete('orders/{order}', 'destroyOrder')->name('orders.destroy');

        Route::get('order-items', 'orderItems')->name('order-items');
        Route::get('order-items/{orderItem}/edit', 'editOrderItem')->name('order-items.edit');
        Route::get('order-items/{orderItem}/delete', 'deleteOrderItem')->name('order-items.delete');
        Route::get('order-items/{orderItem}', 'showOrderItem')->name('order-items.show');
        Route::put('order-items/{orderItem}', 'updateOrderItem')->name('order-items.update');
        Route::delete('order-items/{orderItem}', 'destroyOrderItem')->name('order-items.destroy');

        Route::get('coupons', 'coupons')->name('coupons');
        Route::post('coupons', 'storeCoupon')->name('coupons.store');
        Route::get('coupons/{coupon}/edit', 'editCoupon')->name('coupons.edit');
        Route::get('coupons/{coupon}/delete', 'deleteCoupon')->name('coupons.delete');
        Route::get('coupons/{coupon}', 'showCoupon')->name('coupons.show');
        Route::put('coupons/{coupon}', 'updateCoupon')->name('coupons.update');
        Route::delete('coupons/{coupon}', 'destroyCoupon')->name('coupons.destroy');

        Route::get('reviews', 'reviews')->name('reviews');
        Route::get('reviews/{review}/edit', 'editReview')->name('reviews.edit');
        Route::get('reviews/{review}/delete', 'deleteReview')->name('reviews.delete');
        Route::get('reviews/{review}', 'showReview')->name('reviews.show');
        Route::put('reviews/{review}', 'updateReview')->name('reviews.update');
        Route::delete('reviews/{review}', 'destroyReview')->name('reviews.destroy');

        Route::get('settings', 'settings')->name('settings');
        Route::post('settings', 'storeSetting')->name('settings.store');
        Route::get('settings/{setting}/edit', 'editSetting')->name('settings.edit');
        Route::get('settings/{setting}/delete', 'deleteSetting')->name('settings.delete');
        Route::get('settings/{setting}', 'showSetting')->name('settings.show');
        Route::put('settings/{setting}', 'updateSetting')->name('settings.update');
        Route::delete('settings/{setting}', 'destroySetting')->name('settings.destroy');

        Route::get('payments', 'payments')->name('payments');
        Route::get('payments/{payment}/edit', 'editPayment')->name('payments.edit');
        Route::get('payments/{payment}/delete', 'deletePayment')->name('payments.delete');
        Route::get('payments/{payment}', 'showPayment')->name('payments.show');
        Route::put('payments/{payment}', 'updatePayment')->name('payments.update');
        Route::delete('payments/{payment}', 'destroyPayment')->name('payments.destroy');
    });
    