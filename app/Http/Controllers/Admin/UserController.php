<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.users', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'terms' => 'accepted',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('admin.users')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.edit', ['users' => $users]);
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

        return redirect()->route('admin.users')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User berhasil dihapus');
    }
}
