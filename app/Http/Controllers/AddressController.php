<?php

namespace App\Http\Controllers;

use App\Models\address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    // Show logged in user's addresses
    public function index(Request $request)
    {
        $addresses = address::where('user_id', $request->user()->id)->get();

        return response()->json([
            "message" => "Address List",
            "data" => $addresses
        ]);
    }

    // Add address
    public function store(Request $request)
    {
        $request->validate([
            'full_name'    => 'required|string',
            'mobile'       => 'required|string',
            'address'      => 'required|string',
            'city'         => 'required|string',
            'state'        => 'required|string',
            'country'      => 'required|string',
            'pincode'      => 'required|string',
            'address_type' => 'required|string',
        ]);

        $address = new address();
        $address->user_id      = $request->user()->id;
        $address->full_name    = $request->full_name;
        $address->mobile       = $request->mobile;
        $address->address      = $request->address;
        $address->landmark     = $request->landmark;
        $address->city         = $request->city;
        $address->state        = $request->state;
        $address->country      = $request->country;
        $address->pincode      = $request->pincode;
        $address->address_type = $request->address_type;
        $address->save();

        return response()->json([
            "message" => "Address Added Successfully",
            "data" => $address
        ]);
    }

    // Update address
    public function update(Request $request, $id)
    {
        $address = address::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$address) {
            return response()->json([
                "message" => "Address Not Found"
            ], 404);
        }

        $address->full_name    = $request->full_name;
        $address->mobile       = $request->mobile;
        $address->address      = $request->address;
        $address->landmark     = $request->landmark;
        $address->city         = $request->city;
        $address->state        = $request->state;
        $address->country      = $request->country;
        $address->pincode      = $request->pincode;
        $address->address_type = $request->address_type;
        $address->save();

        return response()->json([
            "message" => "Address Updated Successfully",
            "data" => $address
        ]);
    }

    // Delete address
    public function destroy(Request $request, $id)
    {
        $address = address::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$address) {
            return response()->json([
                "message" => "Address Not Found"
            ], 404);
        }

        $address->delete();

        return response()->json([
            "message" => "Address Deleted Successfully"
        ]);
    }
}
