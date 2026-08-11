<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return brand::all();

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
        $brand = new brand();

        $brand->brand_name = $request->brand_name;
        $brand->slug = $request->slug;
        $brand->logo = $request->logo;
        $brand->description = $request->description;
        $brand->status = $request->status;

        $brand -> save();

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
    public function update(Request $request, Brand $brand)
    {
        $brand->brand_name = $request->brand_name;
        $brand->slug = $request->slug;
        $brand->logo = $request->logo;
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
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return response()->json([
            "message" => "Brand Deleted Successfully"
        ]);
    }
}
