<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(6);
        return view('pages.product', ['products' => $products]);
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|unique:products,slug|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'stock' => 'nullable|integer|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        // auto-generate slug bila kosong
        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products','public');
            $validated['image'] = $path;
            // opsional: resize dengan Intervention Image di sini
        }

        Product::create($validated);
        return redirect()->route('products.index')->with('success','Produk dibuat.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => "required|unique:products,slug,{$product->id}",
            'description' => 'nullable|string',
            'price' => 'nullable|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'stock' => 'nullable|integer|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        if ($request->hasFile('image')) {
            // hapus yang lama jika ada
            if ($product->image) Storage::disk('public')->delete($product->image);
            $path = $request->file('image')->store('products','public');
            $validated['image'] = $path;
        }

        $product->update($validated);
        return back()->with('success','Produk diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) Storage::disk('public')->delete($product->image);
        $product->delete();
        return back()->with('success','Produk dihapus.');
    }
}
