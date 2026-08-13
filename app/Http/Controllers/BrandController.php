<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Brand::all();

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
        $brand = new Brand();

        $brand->brand_name = $request->brand_name;
        $brand->slug = $request->slug;
        if ($request->hasFile('logo')) {
            $brand->logo = $request->file('logo')->store('brands', 'public');
        }
        $brand->description = $request->description;
        $brand->status = $request->status;

        $brand->save();

        return response()->json([
            "message" => "Brand Added Successfully",
            "data" => $brand,

        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return response()->json([
                "message" => "Brand Not Found"
            ], 404);
        }

        $brand->brand_name = $request->brand_name;
        $brand->slug = $request->slug;
        if ($request->hasFile('logo')) {
            if ($brand->logo) Storage::disk('public')->delete($brand->logo);
            $brand->logo = $request->file('logo')->store('brands', 'public');
        }
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->save();

        return response()->json([
            "message" => "Brand Updated Successfully",
            "data" => $brand
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return response()->json([
                "message" => "Brand Not Found"
            ], 404);
        }
        
        $brand->delete();

        return response()->json([
            "message" => "Brand Deleted Successfully"
        ]);
    }
}
