<?php

namespace App\Http\Controllers;

use App\Models\address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return address::all();
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
        $address = new address();

        $address->user_id = $request->user_id;
        $address->full_name = $request->full_name;
        $address->mobile = $request->mobile;
        $address->address = $request->address;
        $address->landmark = $request->landmark;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->pincode = $request->pincode;
        $address->address_type = $request->address_type;
        $address->save();

        return response()->json([
            "message" => "Address Added Successfully",
            "data" => $address,

        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $address = address::find($id);

        if (!$address) {
            return response()->json([
                "message" => "Address Not Found"
            ], 404);
        }

        $address->user_id = $request->user_id;
        $address->full_name = $request->full_name;
        $address->mobile = $request->mobile;
        $address->address = $request->address;
        $address->landmark = $request->landmark;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->pincode = $request->pincode;
        $address->address_type = $request->address_type;
        $address->save();

        return response()->json([
            "message" => "Address updated Successfully",
            "data" => $address,

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $address = address::find($id);

        if(!$address)
            {
                return response()->json([
                    "message" => "Address Not Found"
                ], 404);                        
                
            }
        $address->delete();
        return response()->json([
            "message" => "Address Deleted Successfully",
            "data" => $address,

        ]);

        
    }
}
