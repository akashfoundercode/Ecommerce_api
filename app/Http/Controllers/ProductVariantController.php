<?php

namespace App\Http\Controllers;

use App\Models\product_variant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return product_variant::all();
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
        $product_variant = new product_variant();
        

        $product_variant->product_id = $request->product_id;
        $product_variant->color = $request->color;
        $product_variant->size = $request->size;
        $product_variant->stock = $request->stock;
        $product_variant->price = $request->price;
        $product_variant->status = $request->status;
    
        $product_variant -> save();
    
        return response()->json([
            "message" => "Product Variant Added Successfully",
            "data" => $product_variant,
    
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(product_variant $product_variant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product_variant $product_variant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product_variant = product_variant::find($id);

        if (!$product_variant) {
            return response()->json([
                "message" => "Product Variant Not Found"
            ], 404);
        }

        $product_variant->product_id = $request->product_id;
        $product_variant->color = $request->color;
        $product_variant->size = $request->size;
        $product_variant->stock = $request->stock;
        $product_variant->price = $request->price;
        $product_variant->stock = $request->stock;
        $product_variant->status = $request->status;
    
        $product_variant -> save();
    
        return response()->json([
            "message" => "Product Variant Updated Successfully",
            "data" => $product_variant,
    
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product_variant= product_variant::find($id);

        if (!$product_variant) {
            return response()->json([
                "message" => "Product Variant Not Found"
            ], 404);
        }

        $product_variant->delete();

        return response()->json([
            "message" => "Product Variant Deleted Successfully",

        ]);
    }
}
