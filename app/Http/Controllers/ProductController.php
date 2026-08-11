<?php

namespace App\Http\Controllers;
        
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return products::all();
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
        $product = new product();

         $product->category_id = $request->category_id;
         $product->sub_category_id = $request->sub_category_id;
         $product->brand_id = $request->brand_id;
         $product->product_name = $request->product_name;
         $product->image = $request->image;
         $product->slug = $request->slug;
         $product->sku = $request->sku;
         $product->short_description = $request->short_description;
         $product->description = $request->description;
         $product->specification = $request->specification;
         $product->price = $request->price;
         $product->selling_price = $request->selling_price;
         $product->discount = $request->discount;
         $product->stock = $request->stock;
         $product->thumbnail = $request->thumbnail;
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
    public function update(Request $request, Product $product)
    {
        $product = product::find();
        
         if (!$product) {
            return response()->json([
                "message" => "Product Not Found"
            ], 404);
        }

        $product->category_id = $request->category_id;
         $product->sub_category_id = $request->sub_category_id;
         $product->brand_id = $request->brand_id;
         $product->product_name = $request->product_name;
         $product->image = $request->image;
         $product->slug = $request->slug;
         $product->sku = $request->sku;
         $product->short_description = $request->short_description;
         $product->description = $request->description;
         $product->specification = $request->specification;
         $product->price = $request->price;
         $product->selling_price = $request->selling_price;
         $product->discount = $request->discount;
         $product->stock = $request->stock;
         $product->thumbnail = $request->thumbnail;
         $product->status = $request->status;
         $product->save();

         return response()->json([
             "message" => "Product Added Successfully",
             "data" => $product
         ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product = product::find($id);

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
