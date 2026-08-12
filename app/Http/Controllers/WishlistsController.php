<?php

namespace App\Http\Controllers;

use App\Models\wishlists;
use Illuminate\Http\Request;

class WishlistsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return wishlists::all();
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

        $wishlists = new wishlists();

        $wishlists->user_id = $request->user_id;
        $wishlists->product_id = $request->product_id;
        $wishlists->product_name = $request->product_name;
        $wishlists->product_image = $request->product_image;
        $wishlists->price = $request->price;
        $wishlists->status = $request->status;
        $wishlists->save();

        return response()->json([
            "message" => "Wishlist Added Successfully",
            "data" => $wishlists,

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(wishlists $wishlists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(wishlists $wishlists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, wishlists $wishlists)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $wishlists = wishlists::find($id);
        
        $wishlists->delete();

        return response()->json([
            "message" => "wishlist deleted successfully",
            "data" => $wishlists
        ]);
    }
}
