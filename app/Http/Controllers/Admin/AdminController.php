<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.dashboard', ['products' => $products]);
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.users', ['users' => $users]);
    }

    public function product()
    {
        $products = Product::all();
        return view('admin.products.product', ['products' => $products]);
    }
}
