<?php

use App\Livewire\Cart;
use App\Livewire\Categories;
use App\Livewire\CategoryProducts;
use App\Livewire\Home;
use App\Livewire\Product;
use App\Livewire\Wishlist;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name('home');

Route::get('/categories',Categories::class)->name('categories');

Route::get('/new-arrival', function () {
    return "new-arrival page";
})->name('new-arrival');

Route::get('/about-us', function () {
    return "about-us page";
})->name('about-us');

Route::get('/cart',Cart::class)->name('cart');

Route::get('/profile', function () {
    return "profile page";
})->name('profile');

Route::get('/wishlist',Wishlist::class)->name('wishlist');

Route::get('/categories/{category:slug}',CategoryProducts::class)->name("category");

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