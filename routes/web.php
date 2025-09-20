<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

// Halaman utama
Route::get('/', [PageController::class, 'home'])->name('home');

// Halaman About
Route::get('/about', [PageController::class, 'about'])->name('about');

// Halaman Product
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product/{product}', [ProductController::class,'show'])->name('product.show');

// Halaman Contact
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


