<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

// ==============================
// Public Routes
// ==============================

// Halaman utama
Route::get('/', [PageController::class, 'home'])->name('home');

// Halaman About
Route::get('/about', [PageController::class, 'about'])->name('about');

// Halaman Product (list + detail)
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product/{product}', [ProductController::class,'show'])->name('product.show');

// Halaman Contact
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// ==============================
// Admin Auth Routes
// ==============================
Route::prefix('admin')->group(function () {
    // Login & Logout
    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});

// ==============================
// Protected Admin Routes
// ==============================
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');

    // CRUD Produk
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
});

