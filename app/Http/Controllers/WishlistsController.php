<?php

namespace App\Http\Controllers;

use App\Models\wishlists;
use App\Models\Product;
use Illuminate\Http\Request;

class WishlistsController extends Controller
{
    // Show logged in user's wishlist
    public function index(Request $request)
    {
        $wishlists = wishlists::where('user_id', $request->user()->id)->get();

        return response()->json([
            "message" => "Wishlist",
            "data" => $wishlists
        ]);
    }

    // Add to wishlist
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::find($request->product_id);

        // Already in wishlist check
        $already = wishlists::where('user_id', $request->user()->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($already) {
            return response()->json([
                "message" => "Product Already in Wishlist"
            ], 409);
        }

        $wishlists = new wishlists();
        $wishlists->user_id       = $request->user()->id;
        $wishlists->product_id    = $product->id;
        $wishlists->product_name  = $product->product_name ?? $product->name;
        $wishlists->product_image = $product->thumbnail;
        $wishlists->price         = $product->price;
        $wishlists->status        = 1;
        $wishlists->save();

        return response()->json([
            "message" => "Wishlist Added Successfully",
            "data" => $wishlists
        ]);
    }

    // Remove from wishlist
    public function destroy(Request $request, $id)
    {
        $wishlists = wishlists::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$wishlists) {
            return response()->json([
                "message" => "Wishlist Item Not Found"
            ], 404);
        }

        $wishlists->delete();

        return response()->json([
            "message" => "Wishlist Deleted Successfully"
        ]);
    }
}
