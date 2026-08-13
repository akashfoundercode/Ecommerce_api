<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\cart;
use App\Models\Coupon;
use App\Models\order_items;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    // Get all orders of logged in user
    public function index(Request $request)
    {
        $orders = Order::where('user_id', $request->user()->id)->get();

        return response()->json([
            "message" => "Orders List",
            "data" => $orders
        ]);
    }

    // Place new order
    public function store(Request $request)
    {
        $request->validate([
            'address'        => 'required|string',
            'address_id'     => 'sometimes|nullable|exists:addresses,id',
            'phone'          => 'required|string',
            'payment_method' => 'sometimes|string|in:cod',
            'coupon_code'    => 'sometimes|nullable|string',
            'items'          => 'sometimes|array',
            'items.*.product_id' => 'required_with:items|exists:products,id',
            'items.*.quantity'   => 'required_with:items|integer|min:1',
        ]);

        // Items from request or from cart
        $items = $request->items;

        if (!$items) {
            $items = cart::where('user_id', $request->user()->id)
                ->get(['product_id', 'quantity'])
                ->map(function ($item) {
                    return [
                        'product_id' => $item->product_id,
                        'quantity'   => $item->quantity,
                    ];
                })->toArray();
        }

        if (empty($items)) {
            return response()->json([
                "message" => "Cart is Empty. Please add items first."
            ], 422);
        }

        // Calculate subtotal
        $subtotal = 0;
        foreach ($items as $item) {
            $product = Product::find($item['product_id']);
            $subtotal += $product->price * $item['quantity'];
        }

        // Coupon discount
        $discount = 0;
        $coupon   = null;

        if ($request->coupon_code) {
            $coupon = Coupon::where('code', strtoupper($request->coupon_code))
                ->where('status', 1)
                ->first();

            if (!$coupon) {
                return response()->json([
                    "message" => "Invalid Coupon Code"
                ], 422);
            }

            if ($coupon->min_order_amount > 0 && $subtotal < $coupon->min_order_amount) {
                return response()->json([
                    "message" => "Minimum order amount is " . $coupon->min_order_amount
                ], 422);
            }

            if ($coupon->discount_type == 'percent') {
                $discount = ($subtotal * $coupon->discount) / 100;
            } else {
                $discount = $coupon->discount;
            }
        }

        $total_amount = $subtotal - $discount;

        $order = DB::transaction(function () use ($request, $items, $subtotal, $discount, $total_amount, $coupon) {

            $order = new Order();
            $order->user_id        = $request->user()->id;
            $order->order_number   = strtoupper(Str::random(10));
            $order->address_id     = $request->address_id;
            $order->address        = $request->address;
            $order->phone          = $request->phone;
            $order->subtotal       = $subtotal;
            $order->discount       = $discount;
            $order->delivery_charge = 0;
            $order->total_amount   = $total_amount;
            $order->coupon_id      = $coupon ? $coupon->id : null;
            $order->coupon_code    = $coupon ? $coupon->code : null;
            $order->payment_method = 'cod';
            $order->payment_status = 'pending';
            $order->order_status   = 'pending';
            $order->status         = 'pending';
            $order->save();

            foreach ($items as $item) {
                $product = Product::find($item['product_id']);

                $order_item = new order_items();
                $order_item->order_id    = $order->id;
                $order_item->product_id  = $item['product_id'];
                $order_item->quantity    = $item['quantity'];
                $order_item->price       = $product->price;
                $order_item->total_price = $product->price * $item['quantity'];
                $order_item->save();
            }

            $payment = new Payment();
            $payment->order_id       = $order->id;
            $payment->user_id        = $request->user()->id;
            $payment->amount         = $total_amount;
            $payment->payment_method = 'cod';
            $payment->payment_status = 'pending';
            $payment->save();

            if ($coupon) {
                $coupon->used_count = $coupon->used_count + 1;
                $coupon->save();
            }

            // Clear cart after order
            cart::where('user_id', $request->user()->id)->delete();

            return $order;
        });

        return response()->json([
            "message" => "Order Placed Successfully",
            "data"    => $order
        ]);
    }

    // Get single order with items
    public function show(Request $request, $id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$order) {
            return response()->json([
                "message" => "Order Not Found"
            ], 404);
        }

        $items = order_items::where('order_id', $order->id)->get();

        return response()->json([
            "message" => "Order Detail",
            "data"    => $order,
            "items"   => $items
        ]);
    }

    // Update order status
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,confirmed,processing,delivered,cancelled'
        ]);

        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                "message" => "Order Not Found"
            ], 404);
        }

        $order->status       = $request->status;
        $order->order_status = $request->status;
        $order->save();

        return response()->json([
            "message" => "Order Status Updated",
            "data"    => $order
        ]);
    }

    // Cancel order
    public function destroy(Request $request, $id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$order) {
            return response()->json([
                "message" => "Order Not Found"
            ], 404);
        }

        if ($order->status == 'delivered') {
            return response()->json([
                "message" => "Delivered Order Cannot be Cancelled"
            ], 422);
        }

        $order->status       = 'cancelled';
        $order->order_status = 'cancelled';
        $order->save();

        return response()->json([
            "message" => "Order Cancelled Successfully",
            "data"    => $order
        ]);
    }
}
