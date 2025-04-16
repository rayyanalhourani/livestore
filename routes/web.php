<?php

use App\Livewire\Home;
use App\Livewire\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name('home');

Route::get('/categories', function () {
    return "categories page";
})->name('categories');

Route::get('/new-arrival', function () {
    return "new-arrival page";
})->name('new-arrival');

Route::get('/about-us', function () {
    return "about-us page";
})->name('about-us');

Route::get('/cart', function () {
    return "cart page";
})->name('cart');

Route::get('/profile', function () {
    return "profile page";
})->name('profile');

Route::get('/wishlist', function () {
    return "wishlist page";
})->name('wishlist');

Route::get('/categories/{category:slug}', function (Category $category) {
    return $category;
})->name("category");

Route::get('/product/{product}',Product::class)->name("product.show");

Route::get('/products', function () {
    return "products page";
})->name('products');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});