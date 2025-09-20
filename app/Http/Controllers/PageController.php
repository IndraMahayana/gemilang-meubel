<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::latest()->paginate(3);
        return view('pages.home', ['products' => $products]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function product()
    {
        return view('pages.product');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}