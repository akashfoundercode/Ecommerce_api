<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Show All Categories
    public function index()
    {
        return Category::all();
    }

    // Add Category
    public function store(Request $request)
    {
        $category = new Category();

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->image = $request->image;
        $category->description = $request->description;
        $category->status = $request->status;

        $category->save();

        return response()->json([
            "message" => "Category Added Successfully",
            "data" => $category
        ]);
    }

    // Update Category
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                "message" => "Category Not Found"
            ], 404);
        }

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->image = $request->image;
        $category->description = $request->description;
        $category->status = $request->status;

        $category->save();

        return response()->json([
            "message" => "Category Updated Successfully",
            "data" => $category
        ]);
    }

    // Delete Category
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                "message" => "Category Not Found"
            ], 404);
        }

        $category->delete();

        return response()->json([
            "message" => "Category Deleted Successfully",
        ]);
    }
}