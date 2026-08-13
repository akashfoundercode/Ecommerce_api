<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\address;
use App\Models\cart;
use App\Models\order;
use App\Models\order_items;
use App\Models\product_variant;
use App\Models\review;
use App\Models\setting;
use App\Models\wishlists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function home()
    {
        return view('Frontend.index', ['products' => Product::latest()->get()]);
    }

    public function index() { return view('admin.index'); }
    public function login() { return view('admin.login'); }
    public function myprofile() { return view('admin.myprofile'); }

    
    public function products()
    {
        return view('admin.products.index', ['products' => Product::latest()->get()]);
    }

    public function storeProduct(Request $request)
    {
        if ($request->filled('name') && ! $request->filled('product_name')) {
            $request->merge(['product_name' => $request->input('name')]);
        }

        $data = $request->validate([
            'product_name' => 'required|string|max:255',
            'name'         => 'nullable|string|max:255',
            'price'        => 'required|numeric|min:0',
            'selling_price'=> 'nullable|numeric|min:0',
            'sku'          => 'nullable|string|max:100',
            'stock'        => 'nullable|integer|min:0',
            'description'  => 'nullable|string',
            'image_url'    => 'nullable|string|max:2048',
            'status'       => 'nullable|boolean',
            'category_id'  => 'nullable|exists:categories,id',
            'brand_id'     => 'nullable|exists:brands,id',
            'thumbnail'    => 'nullable|image|max:2048',
        ]);

        $data['name'] = $data['name'] ?? $data['product_name'];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('products', 'public');
        }

        Product::create($data);
        return redirect()->route('admin.products')->with('success', 'Product added successfully.');
    }

    public function editProduct(Product $product)
    {
        return view('admin.products.edit', [
            'product'    => $product,
            'categories' => Category::all(),
            'brands'     => Brand::all(),
        ]);
    }

    public function showProduct(Product $product)
    {
        return view('admin.products.show', ['product' => $product]);
    }

    public function deleteProduct(Product $product)
    {
        return view('admin.products.delete', ['product' => $product]);
    }

    public function updateProduct(Request $request, Product $product)
    {
        $data = $request->validate([
            'product_name' => 'required|string|max:255',
            'price'        => 'required|numeric|min:0',
            'selling_price'=> 'nullable|numeric|min:0',
            'sku'          => 'nullable|string|max:100',
            'stock'        => 'nullable|integer|min:0',
            'description'  => 'nullable|string',
            'status'       => 'nullable|boolean',
            'category_id'  => 'nullable|exists:categories,id',
            'brand_id'     => 'nullable|exists:brands,id',
            'thumbnail'    => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($product->thumbnail) Storage::disk('public')->delete($product->thumbnail);
            $data['thumbnail'] = $request->file('thumbnail')->store('products', 'public');
        }

        $product->update($data);
        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    public function destroyProduct(Product $product)
    {
        if ($product->thumbnail) Storage::disk('public')->delete($product->thumbnail);
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }

    
    public function categories()
    {
        return view('admin.categories.index', ['items' => Category::latest()->get()]);
    }

    public function storeCategory(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:255', 'slug' => 'nullable|string', 'description' => 'nullable|string', 'status' => 'nullable|boolean', 'image' => 'nullable|image|max:2048']);
        if ($request->hasFile('image')) $data['image'] = $request->file('image')->store('categories', 'public');
        Category::create($data);
        return redirect()->route('admin.categories')->with('success', 'Category added successfully.');
    }

    public function editCategory(Category $category)
    {
        return view('admin.categories.edit', ['item' => $category]);
    }

    public function showCategory(Category $category)
    {
        return view('admin.categories.show', ['item' => $category]);
    }

    public function deleteCategory(Category $category)
    {
        return view('admin.categories.delete', ['item' => $category]);
    }

    public function updateCategory(Request $request, Category $category)
    {
        $data = $request->validate(['name' => 'required|string|max:255', 'slug' => 'nullable|string', 'description' => 'nullable|string', 'status' => 'nullable|boolean', 'image' => 'nullable|image|max:2048']);
        if ($request->hasFile('image')) {
            if ($category->image) Storage::disk('public')->delete($category->image);
            $data['image'] = $request->file('image')->store('categories', 'public');
        }
        $category->update($data);
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }

    public function destroyCategory(Category $category)
    {
        if ($category->image) Storage::disk('public')->delete($category->image);
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }

   
    public function subcategories()
    {
        return view('admin.subcategories.index', ['items' => SubCategory::latest()->get(), 'categories' => Category::all()]);
    }

    public function storeSubcategory(Request $request)
    {
        $data = $request->validate(['sub_category_name' => 'required|string|max:255', 'category_id' => 'required|exists:categories,id', 'slug' => 'nullable|string', 'description' => 'nullable|string', 'status' => 'nullable|boolean', 'image' => 'nullable|image|max:2048']);
        if ($request->hasFile('image')) $data['image'] = $request->file('image')->store('subcategories', 'public');
        SubCategory::create($data);
        return redirect()->route('admin.subcategories')->with('success', 'Sub-category added successfully.');
    }
    
    public function editSubcategory(SubCategory $subcategory)
    {
        return view('admin.subcategories.edit', ['item' => $subcategory, 'categories' => Category::all()]);
    }

    public function showSubcategory(SubCategory $subcategory)
    {
        return view('admin.subcategories.show', ['item' => $subcategory]);
    }

    public function deleteSubcategory(SubCategory $subcategory)
    {
        return view('admin.subcategories.delete', ['item' => $subcategory]);
    }

    public function updateSubcategory(Request $request, SubCategory $subcategory)
    {
        $data = $request->validate(['sub_category_name' => 'required|string|max:255', 'category_id' => 'required|exists:categories,id', 'slug' => 'nullable|string', 'description' => 'nullable|string', 'status' => 'nullable|boolean', 'image' => 'nullable|image|max:2048']);
        if ($request->hasFile('image')) {
            if ($subcategory->image) Storage::disk('public')->delete($subcategory->image);
            $data['image'] = $request->file('image')->store('subcategories', 'public');
        }
        $subcategory->update($data);
        return redirect()->route('admin.subcategories')->with('success', 'Sub-category updated successfully.');
    }

    public function destroySubcategory(SubCategory $subcategory)
    {
        if ($subcategory->image) Storage::disk('public')->delete($subcategory->image);
        $subcategory->delete();
        return redirect()->route('admin.subcategories')->with('success', 'Sub-category deleted successfully.');
    }

    
    public function brands()
    {
        return view('admin.brands.index', ['items' => Brand::latest()->get()]);
    }

    public function storeBrand(Request $request)
    {
        $data = $request->validate(['brand_name' => 'required|string|max:255', 'slug' => 'nullable|string', 'description' => 'nullable|string', 'status' => 'nullable|boolean', 'logo' => 'nullable|image|max:2048']);
        if ($request->hasFile('logo')) $data['logo'] = $request->file('logo')->store('brands', 'public');
        Brand::create($data);
        return redirect()->route('admin.brands')->with('success', 'Brand added successfully.');
    }

    public function editBrand(Brand $brand)
    {
        return view('admin.brands.edit', ['item' => $brand]);
    }

    public function showBrand(Brand $brand)
    {
        return view('admin.brands.show', ['item' => $brand]);
    }

    public function deleteBrand(Brand $brand)
    {
        return view('admin.brands.delete', ['item' => $brand]);
    }

    public function updateBrand(Request $request, Brand $brand)
    {
        $data = $request->validate(['brand_name' => 'required|string|max:255', 'slug' => 'nullable|string', 'description' => 'nullable|string', 'status' => 'nullable|boolean', 'logo' => 'nullable|image|max:2048']);
        if ($request->hasFile('logo')) {
            if ($brand->logo) Storage::disk('public')->delete($brand->logo);
            $data['logo'] = $request->file('logo')->store('brands', 'public');
        }
        $brand->update($data);
        return redirect()->route('admin.brands')->with('success', 'Brand updated successfully.');
    }

    public function destroyBrand(Brand $brand)
    {
        if ($brand->logo) Storage::disk('public')->delete($brand->logo);
        $brand->delete();
        return redirect()->route('admin.brands')->with('success', 'Brand deleted successfully.');
    }

  
    public function productImages()
    {
        return view('admin.product-images.index', ['items' => ProductImage::with('product')->latest()->get(), 'products' => Product::all()]);
    }

    public function storeProductImage(Request $request)
    {
        $data = $request->validate(['product_id' => 'required|exists:products,id', 'image' => 'required|image|max:2048']);
        $data['image'] = $request->file('image')->store('product-images', 'public');
        ProductImage::create($data);
        return redirect()->route('admin.product-images')->with('success', 'Image added successfully.');
    }

    public function showProductImage(ProductImage $productImage)
    {
        return view('admin.product-images.show', ['item' => $productImage]);
    }

    public function editProductImage(ProductImage $productImage)
    {
        return view('admin.product-images.edit', ['item' => $productImage, 'products' => Product::all()]);
    }

    public function updateProductImage(Request $request, ProductImage $productImage)
    {
        $data = $request->validate(['product_id' => 'required|exists:products,id', 'image' => 'nullable|image|max:2048']);
        if ($request->hasFile('image')) {
            if ($productImage->image) Storage::disk('public')->delete($productImage->image);
            $data['image'] = $request->file('image')->store('product-images', 'public');
        }
        $productImage->update($data);
        return redirect()->route('admin.product-images')->with('success', 'Image updated successfully.');
    }

    public function deleteProductImage(ProductImage $productImage)
    {
        return view('admin.product-images.delete', ['item' => $productImage]);
    }

    public function destroyProductImage(ProductImage $productImage)
    {
        if ($productImage->image) Storage::disk('public')->delete($productImage->image);
        $productImage->delete();
        return redirect()->route('admin.product-images')->with('success', 'Image deleted successfully.');
    }

    
    public function productVariants()
    {
        return view('admin.product-variants.index', ['items' => product_variant::latest()->get(), 'products' => Product::all()]);
    }

    public function storeProductVariant(Request $request)
    {
        $data = $request->validate(['product_id' => 'required|exists:products,id', 'color' => 'nullable|string', 'size' => 'nullable|string', 'stock' => 'nullable|integer', 'price' => 'required|numeric', 'status' => 'nullable|boolean']);
        product_variant::create($data);
        return redirect()->route('admin.product-variants')->with('success', 'Variant added successfully.');
    }

    public function editProductVariant(product_variant $productVariant)
    {
        return view('admin.product-variants.edit', ['item' => $productVariant, 'products' => Product::all()]);
    }

    public function showProductVariant(product_variant $productVariant)
    {
        return view('admin.product-variants.show', ['item' => $productVariant, 'products' => Product::all()]);
    }

    public function deleteProductVariant(product_variant $productVariant)
    {
        return view('admin.product-variants.delete', ['item' => $productVariant]);
    }

    public function updateProductVariant(Request $request, product_variant $productVariant)
    {
        $data = $request->validate(['product_id' => 'required|exists:products,id', 'color' => 'nullable|string', 'size' => 'nullable|string', 'stock' => 'nullable|integer', 'price' => 'required|numeric', 'status' => 'nullable|boolean']);
        $productVariant->update($data);
        return redirect()->route('admin.product-variants')->with('success', 'Variant updated successfully.');
    }

    public function destroyProductVariant(product_variant $productVariant)
    {
        $productVariant->delete();
        return redirect()->route('admin.product-variants')->with('success', 'Variant deleted successfully.');
    }

  
    public function carts()
    {
        return view('admin.carts.index', ['items' => cart::latest()->get()]);
    }

    public function showCart(cart $cart)
    {
        return view('admin.carts.show', ['item' => $cart]);
    }

    public function editCart(cart $cart)
    {
        return view('admin.carts.edit', ['item' => $cart]);
    }

    public function updateCart(Request $request, cart $cart)
    {
        $data = $request->validate(['quantity' => 'required|integer|min:1', 'price' => 'required|numeric|min:0']);
        $data['total_price'] = $data['quantity'] * $data['price'];
        $cart->update($data);
        return redirect()->route('admin.carts')->with('success', 'Cart item updated successfully.');
    }

    public function deleteCart(cart $cart)
    {
        return view('admin.carts.delete', ['item' => $cart]);
    }

    public function destroyCart(cart $cart)
    {
        $cart->delete();
        return redirect()->route('admin.carts')->with('success', 'Cart item deleted successfully.');
    }

    
    public function wishlists()
    {
        return view('admin.wishlists.index', ['items' => wishlists::latest()->get()]);
    }

    public function showWishlist(wishlists $wishlist)
    {
        return view('admin.wishlists.show', ['item' => $wishlist]);
    }

    public function editWishlist(wishlists $wishlist)
    {
        return view('admin.wishlists.edit', ['item' => $wishlist]);
    }

    public function updateWishlist(Request $request, wishlists $wishlist)
    {
        $wishlist->update($request->validate(['status' => 'required|string|max:100']));
        return redirect()->route('admin.wishlists')->with('success', 'Wishlist item updated successfully.');
    }

    public function deleteWishlist(wishlists $wishlist)
    {
        return view('admin.wishlists.delete', ['item' => $wishlist]);
    }

    public function destroyWishlist(wishlists $wishlist)
    {
        $wishlist->delete();
        return redirect()->route('admin.wishlists')->with('success', 'Wishlist item deleted successfully.');
    }

  
    public function addresses()
    {
        return view('admin.addresses.index', ['items' => address::latest()->get()]);
    }

    public function showAddress(address $address)
    {
        return view('admin.addresses.show', ['item' => $address]);
    }

    public function editAddress(address $address)
    {
        return view('admin.addresses.edit', ['item' => $address]);
    }

    public function updateAddress(Request $request, address $address)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'address' => 'nullable|string',
            'landmark' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'pincode' => 'nullable|string|max:20',
            'address_type' => 'nullable|string|max:50',
        ]);
        $address->update($data);
        return redirect()->route('admin.addresses')->with('success', 'Address updated successfully.');
    }

    public function deleteAddress(address $address)
    {
        return view('admin.addresses.delete', ['item' => $address]);
    }

    public function destroyAddress(address $address)
    {
        $address->delete();
        return redirect()->route('admin.addresses')->with('success', 'Address deleted successfully.');
    }

    
    public function orders()
    {
        return view('admin.orders.index', ['items' => order::latest()->get()]);
    }

    public function editOrder(order $order)
    {
        return view('admin.orders.edit', ['item' => $order]);
    }

    public function showOrder(order $order)
    {
        return view('admin.orders.show', ['item' => $order]);
    }

    public function deleteOrder(order $order)
    {
        return view('admin.orders.delete', ['item' => $order]);
    }

    public function updateOrder(Request $request, order $order)
    {
        $data = $request->validate(['order_status' => 'required|string', 'payment_status' => 'required|string']);
        $order->update($data);
        return redirect()->route('admin.orders')->with('success', 'Order updated successfully.');
    }

    public function destroyOrder(order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders')->with('success', 'Order deleted successfully.');
    }

  
    public function orderItems()
    {
        return view('admin.order-items.index', ['items' => order_items::latest()->get()]);
    }

    public function showOrderItem(order_items $orderItem)
    {
        return view('admin.order-items.show', ['item' => $orderItem]);
    }

    public function editOrderItem(order_items $orderItem)
    {
        return view('admin.order-items.edit', ['item' => $orderItem]);
    }

    public function updateOrderItem(Request $request, order_items $orderItem)
    {
        $data = $request->validate(['quantity' => 'required|integer|min:1', 'price' => 'required|numeric|min:0']);
        $data['total_price'] = $data['quantity'] * $data['price'];
        $orderItem->update($data);
        return redirect()->route('admin.order-items')->with('success', 'Order item updated successfully.');
    }

    public function deleteOrderItem(order_items $orderItem)
    {
        return view('admin.order-items.delete', ['item' => $orderItem]);
    }

    public function destroyOrderItem(order_items $orderItem)
    {
        $orderItem->delete();
        return redirect()->route('admin.order-items')->with('success', 'Order item deleted successfully.');
    }

    
    public function coupons()
    {
        return view('admin.coupons.index', ['items' => Coupon::latest()->get()]);
    }

    public function storeCoupon(Request $request)
    {
        $data = $request->validate(['code' => 'required|string|unique:coupons,code', 'discount_type' => 'required|in:percent,fixed', 'discount' => 'required|numeric|min:0', 'min_order_amount' => 'nullable|numeric|min:0', 'usage_limit' => 'nullable|integer|min:1', 'status' => 'nullable|boolean']);
        Coupon::create($data);
        return redirect()->route('admin.coupons')->with('success', 'Coupon added successfully.');
    }

    public function editCoupon(Coupon $coupon)
    {
        return view('admin.coupons.edit', ['item' => $coupon]);
    }

    public function showCoupon(Coupon $coupon)
    {
        return view('admin.coupons.show', ['item' => $coupon]);
    }

    public function deleteCoupon(Coupon $coupon)
    {
        return view('admin.coupons.delete', ['item' => $coupon]);
    }

    public function updateCoupon(Request $request, Coupon $coupon)
    {
        $data = $request->validate(['code' => 'required|string|unique:coupons,code,'.$coupon->id, 'discount_type' => 'required|in:percent,fixed', 'discount' => 'required|numeric|min:0', 'min_order_amount' => 'nullable|numeric|min:0', 'usage_limit' => 'nullable|integer|min:1', 'status' => 'nullable|boolean']);
        $coupon->update($data);
        return redirect()->route('admin.coupons')->with('success', 'Coupon updated successfully.');
    }

    public function destroyCoupon(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons')->with('success', 'Coupon deleted successfully.');
    }

   
    public function reviews()
    {
        return view('admin.reviews.index', ['items' => review::latest()->get()]);
    }

    public function showReview(review $review)
    {
        return view('admin.reviews.show', ['item' => $review]);
    }

    public function editReview(review $review)
    {
        return view('admin.reviews.edit', ['item' => $review]);
    }

    public function updateReview(Request $request, review $review)
    {
        $review->update($request->validate(['status' => 'required|boolean']));
        return redirect()->route('admin.reviews')->with('success', 'Review updated successfully.');
    }

    public function deleteReview(review $review)
    {
        return view('admin.reviews.delete', ['item' => $review]);
    }

    public function destroyReview(review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews')->with('success', 'Review deleted successfully.');
    }

   
    public function settings()
    {
        return view('admin.settings.index', ['items' => setting::latest()->get()]);
    }

    public function storeSetting(Request $request)
    {
        $data = $request->validate(['key' => 'required|string|unique:settings,key', 'value' => 'nullable|string']);
        setting::create($data);
        return redirect()->route('admin.settings')->with('success', 'Setting added successfully.');
    }

    public function editSetting(setting $setting)
    {
        return view('admin.settings.edit', ['item' => $setting]);
    }

    public function showSetting(setting $setting)
    {
        return view('admin.settings.show', ['item' => $setting]);
    }

    public function deleteSetting(setting $setting)
    {
        return view('admin.settings.delete', ['item' => $setting]);
    }

    public function updateSetting(Request $request, setting $setting)
    {
        $setting->update($request->validate(['key' => 'required|string|unique:settings,key,'.$setting->id, 'value' => 'nullable|string']));
        return redirect()->route('admin.settings')->with('success', 'Setting updated successfully.');
    }

    public function destroySetting(setting $setting)
    {
        $setting->delete();
        return redirect()->route('admin.settings')->with('success', 'Setting deleted successfully.');
    }

    
    public function payments()
    {
        return view('admin.payments.index', ['items' => Payment::latest()->get()]);
    }

    public function showPayment(Payment $payment)
    {
        return view('admin.payments.show', ['item' => $payment]);
    }

    public function editPayment(Payment $payment)
    {
        return view('admin.payments.edit', ['item' => $payment]);
    }

    public function updatePayment(Request $request, Payment $payment)
    {
        $payment->update($request->validate([
            'payment_status' => 'required|string|max:100',
            'transaction_id' => 'nullable|string|max:255',
        ]));
        return redirect()->route('admin.payments')->with('success', 'Payment updated successfully.');
    }

    public function deletePayment(Payment $payment)
    {
        return view('admin.payments.delete', ['item' => $payment]);
    }

    public function destroyPayment(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('admin.payments')->with('success', 'Payment deleted successfully.');
    }
}
