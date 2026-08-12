<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            cart::where('user_id',
            $request->user()->id)->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id'=> 'required|exists:products,id',
            'quantity'=> 'required|integer|min:1',
        ]);

        $product= Product::findOrFail($request->product_id);

        $cart= cart::create([
            'user_id' => $request->user()->id,
            'product_id' => $product->id,
            'quantity'=> $request->quantity,
            'price'=> $product->price,
            'total_price'=> $product->price * $request->quantity,
        ]);

        return response()->json($cart, 201);
    }

    public function update(Request $request, $id)
    {
        $cart= cart::where('id', $id)->where('user_id', $request->user()->id)->firstOrFail();

        $request->validate(['quantity'=> 'required|integer|min:1']);

        $cart->update([
            'quantity'    => $request->quantity,
            'total_price' => $cart->price * $request->quantity,
        ]);

        return response()->json($cart);
    }

    public function destroy(Request $request, $id)
    {
        $cart = cart::where('id', $id)->where('user_id', $request->user()->id)->firstOrFail();
        $cart->delete();

        return response()->json([
            'message' => 'Removed from cart'

            ]);
;    }
}
