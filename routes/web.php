<?php

use App\Livewire\Home;
use App\Models\Category;
use App\Models\Product;
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

Route::get('/product/{product}', function (Product $product) {
    return $product;
})->name("product.show");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// <x-nav-link href="{{ route('') }}" :active="request()->routeIs('home')">
// New arrival
// </x-nav-link>
// <x-nav-link href="{{ route('') }}" :active="request()->routeIs('home')">
// 
// </x-nav-link>