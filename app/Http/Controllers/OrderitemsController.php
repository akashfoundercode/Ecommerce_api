<?php

namespace App\Http\Controllers;

use App\Models\order_items;
use Illuminate\Http\Request;

class OrderitemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $order_items = order_items::all();

        return response()->json([
            "message" => "Orders items List",
            "data" => $order_items
        ]);
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
    public function store(Request $request )
    {

    $request->validate([
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity'   => 'required|integer|min:1',
        ]);

        $total_amount = 0;

        $order_items = new order_items();
        $order_items->order_id = $request->order_id;
        $order_items->product_id = $request->product_id;
        $order_items->quantity = $request->quantity;
        $order_items->price = $request->price;
        $order_items->total_price = $request->total_price;
        $order_items->save();

       
        return response()->json([
            "message" => "Order Placed Successfully",
            "data"    => $order_items
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(orderitems $orderitems)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, orderitems $orderitems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order_items = order_items::find($id);

        if (!$order_items) {
            return response()->json([
                "message" => "Order Item Not Found"
            ], 404);
        }

        $order_items->delete();

        return response()->json([
            "message" => "Order Item Deleted Successfully"
        ]);
        
    }
}
