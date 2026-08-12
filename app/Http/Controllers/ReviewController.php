<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $reviews = review::with(['user:id,name', 'product:id,product_name,name'])
            ->when($request->product_id, function ($query) use ($request) {
                $query->where('product_id', $request->product_id);
            })
            ->latest()
            ->get();

        return response()->json([
            "message" => "Reviews List",
            "data"=> $reviews
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'status' => 'sometimes|boolean',
        ]);
    
        $review = review::create([
            'user_id' => $request->user()->id,
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'status' => $request->status ?? 1,
        ]);

        return response()->json([
            "message" => "Review Added Successfully",
            "data" => $review
        ], 201);
    }

    public function show($id)
    {
        $review = review::with(['user:id,name', 'product:id,product_name,name'])->find($id);

        if (!$review) {
            return response()->json([
                "message" => "Review Not Found"
            ], 404);
        }

        return response()->json([
            "message" => "Review Detail",
            "data" => $review
        ]);
    }

    public function update(Request $request, $id)
    {
        $review = review::where('id', $id)->where('user_id', $request->user()->id)->first();

        if (!$review) {
            return response()->json([
                "message" => "Review Not Found"
            ], 404);
        }

        $request->validate([
            'rating' => 'sometimes|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'status' => 'sometimes|boolean',
        ]);

        $review->update($request->only(['rating', 'comment', 'status']));

        return response()->json([
            "message" => "Review Updated Successfully",
            "data" => $review
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $review = review::where('id', $id)->where('user_id', $request->user()->id)->first();

        if (!$review) {
            return response()->json([
                "message" => "Review Not Found"
            ], 404);
        }

        $review->delete();

        return response()->json([
            "message" => "Review Deleted Successfully",
            "data" => $review
        ]);
    }
}
