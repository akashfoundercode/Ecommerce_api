<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    // Show All Sub Categories
    public function index()
    {
        return SubCategory::all();
    }

    
    public function store(Request $request)
    {
        $subcategory = new SubCategory();

        $subcategory->category_id = $request->category_id;
        $subcategory->sub_category_name = $request->sub_category_name;
        $subcategory->slug = Str::slug($request->sub_category_name);
        if ($request->hasFile('image')) {
            $subcategory->image = $request->file('image')->store('subcategories', 'public');
        } elseif ($request->filled('image')) {
            $subcategory->image = $request->image;
        }
        $subcategory->description = $request->description;
        $subcategory->status = $request->status;

        $subcategory->save();

        return response()->json([
            "message" => "Sub Category Added Successfully",
            "data" => $subcategory
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);

        if (!$subcategory) {
            return response()->json([
                "message" => "Sub Category Not Found"
            ], 404);
        }

        $subcategory->category_id= $request->category_id;
        $subcategory->sub_category_name = $request->sub_category_name;
        $subcategory->slug= Str::slug($request->sub_category_name);
        if ($request->hasFile('image')) {
            if ($subcategory->image && ! str_starts_with($subcategory->image, 'http')) {
                Storage::disk('public')->delete($subcategory->image);
            }
            $subcategory->image = $request->file('image')->store('subcategories', 'public');
        } elseif ($request->filled('image')) {
            $subcategory->image = $request->image;
        }
        $subcategory->description = $request->description;
        $subcategory->status= $request->status;

        $subcategory->save();

        return response()->json([
            "message" => "Sub Category Updated Successfully",
            "data" => $subcategory
        ]);
    }


    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);

        if (!$subcategory) {
            return response()->json([
                "message" => "Sub Category Not Found"
            ], 404);
        }

        $subcategory->delete();

        return response()->json([
            "message" => "Sub Category Deleted Successfully"
        ]);
    }
}
