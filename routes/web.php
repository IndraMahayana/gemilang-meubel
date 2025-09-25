<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
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

// admin

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminProductController::class, 'index'])->name('admin.dashboard');

    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');

    Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');

    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');

    Route::put('/products/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
});


