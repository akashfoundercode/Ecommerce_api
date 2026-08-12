<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        return Coupon::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'=> 'required|unique:coupons,code',
            'discount_type' => 'required|in:flat,percent',
            'discount'=> 'required|numeric|min:0',
        ]);

        $coupon = new Coupon();

        $coupon->code= strtoupper($request->code);
        $coupon->discount_type= $request->discount_type;
        $coupon->discount= $request->discount;
        $coupon->min_order_amount = $request->min_order_amount ?? 0;
        $coupon->usage_limit= $request->usage_limit;
        $coupon->used_count = 0;
        $coupon->status= $request->status ?? 1;
        $coupon->save();

        return response()->json([
            "message" => "Coupon Added",
            "data" => $coupon
        ]);
    }

    public function check(Request $request)
    {
        $request->validate([
            'code'=> 'required',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $coupon = Coupon::where('code', strtoupper($request->code))
            ->where('status', 1)
            ->first();

        if (!$coupon) {
            return response()->json([
                "message" => "Invalid Coupon Code"
            ], 404);
        }


        return response()->json([
            "message" => "Coupon Applied Successfully",
            "data" => $coupon,
            "discount" => $discount,
            "final_amount" => $request->total_amount - $discount
        ]);
    }

    public function update(Request $request, $id)
    {
        $coupon = Coupon::find($id);

        if (!$coupon) {
            return response()->json([
                "message"=> "Coupon Not Found"
            ], 404);
        }

        $coupon->code = strtoupper($request->code);
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->min_order_amount = $request->min_order_amount ?? 0;
        $coupon->usage_limit = $request->usage_limit;
        $coupon->status = $request->status ?? 1;
        $coupon->save();

        return response()->json([
            "message" => "Coupon Updated Successfully",
            "data" => $coupon
        ]);
    }

    public function destroy($id)
    {
        $coupon = Coupon::find($id);

        if (!$coupon) {
            return response()->json([
                "message"=> "Coupon Not Found"
            ], 404);
        }

        $coupon->delete();

        return response()->json([
            "message"=> "Coupon Deleted "
        ]);
    }
}
