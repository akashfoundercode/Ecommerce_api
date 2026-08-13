<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();

         $product->category_id = $request->category_id;
         $product->sub_category_id = $request->sub_category_id;
         $product->brand_id = $request->brand_id;
         $product->product_name = $request->product_name;
         if ($request->hasFile('image')) {
             $product->image = $request->file('image')->store('products', 'public');
         } elseif ($request->filled('image')) {
             $product->image = $request->image;
         }
         $product->slug = $request->slug;
         $product->sku = $request->sku;
         $product->short_description = $request->short_description;
         $product->description = $request->description;
         $product->specification = $request->specification;
         $product->price = $request->price;
         $product->selling_price = $request->selling_price;
         $product->discount = $request->discount;
         $product->stock = $request->stock;
         if ($request->hasFile('thumbnail')) {
             $product->thumbnail = $request->file('thumbnail')->store('products', 'public');
         }
         $product->status = $request->status;
         $product->save();

         return response()->json([
             "message" => "Product Added Successfully",
             "data" => $product
         ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        
         if (!$product) {
            return response()->json([
                "message" => "Product Not Found"
            ], 404);
        }

        $product->category_id = $request->category_id;
         $product->sub_category_id = $request->sub_category_id;
         $product->brand_id = $request->brand_id;
         $product->product_name = $request->product_name;
         if ($request->hasFile('image')) {
             if ($product->image && ! str_starts_with($product->image, 'http')) {
                 Storage::disk('public')->delete($product->image);
             }
             $product->image = $request->file('image')->store('products', 'public');
         } elseif ($request->filled('image')) {
             $product->image = $request->image;
         }
         $product->slug = $request->slug;
         $product->sku = $request->sku;
         $product->short_description = $request->short_description;
         $product->description = $request->description;
         $product->specification = $request->specification;
         $product->price = $request->price;
         $product->selling_price = $request->selling_price;
         $product->discount = $request->discount;
         $product->stock = $request->stock;
         if ($request->hasFile('thumbnail')) {
             if ($product->thumbnail) Storage::disk('public')->delete($product->thumbnail);
             $product->thumbnail = $request->file('thumbnail')->store('products', 'public');
         }
         $product->status = $request->status;
         $product->save();

         return response()->json([
             "message" => "Product Updated Successfully",
             "data" => $product
         ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product)
            {
                return response()->json([
                    "message" => "Product Not Found"
                ], 404);                        
                
            }
        $product->delete();
        return response()->json([
            "message" => "Product Deleted Successfully",
            "data" => $product,

        ]);


    }
}
