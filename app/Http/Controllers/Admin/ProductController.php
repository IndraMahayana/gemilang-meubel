<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product', ['products' => $products]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'slug' => 'required|unique:products,slug', // Hapus validasi slug
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'stock' => 'required|integer',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        $data = $request->all();

        // Generate slug otomatis
        $data['slug'] = Str::slug($request->name);

        // Pastikan slug unik
        $count = Product::where('slug', $data['slug'])->count();
        if ($count > 0) {
            $data['slug'] .= '-' . ($count + 1);
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            // 'slug' => 'required|unique:products,slug,' . $product->id, // Hapus validasi slug
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'stock' => 'required|integer',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        $data = $request->all();

        // Generate slug otomatis dari nama
        $data['slug'] = Str::slug($request->name);

        // Pastikan slug unik (kecuali untuk produk yang sedang diupdate)
        $count = Product::where('slug', $data['slug'])->where('id', '!=', $product->id)->count();
        if ($count > 0) {
            $data['slug'] .= '-' . ($count + 1);
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Produk berhasil dihapus');
    }
}
