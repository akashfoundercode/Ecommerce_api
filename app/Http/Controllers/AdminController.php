<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        $products = Product::latest()->get();

        return view('Frontend.index', compact('products'));
    }

    public function index(Request $request)
    {
        return view('admin.index');
    }

    public function login(Request $request)
    {
        return view('admin.login');
    }
    
    public function myprofile(Request $request)
    {
        return view('admin.profile');
    }

    public function products()
    {
        $products = Product::latest()->get();

        return view('admin.products', compact('products'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        $data = $request->only('name', 'price', 'description');

        if ($request->hasFile('image')) {
            $data['image_url'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products')->with('success', 'Product add ho gaya.');
    }

    public function editProduct(Product $product)
    {
        return response()->json($product);
    }

    public function updateProduct(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        $data = $request->only('name', 'price', 'description');

        if ($request->hasFile('image')) {
            $data['image_url'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products')->with('success', 'Product update ho gaya.');
    }

    public function destroyProduct(Product $product)
    {
        if ($product->image_url) {
            \Storage::disk('public')->delete($product->image_url);
        }
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product delete ho gaya.');
    }
}
