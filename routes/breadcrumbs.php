<?php

use App\Models\Category;
use App\Models\Product;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('product', function (BreadcrumbTrail $trail, Product $product) {
    $trail->push('Home', route('home'));
    $trail->push('Products', route('products'));
    $trail->push($product->name, route('product.show', $product));
});

Breadcrumbs::for('category', function (BreadcrumbTrail $trail, Category $category) {
    $trail->push('Home', route('home'));
    $trail->push('Categories', route('categories'));
    $trail->push($category->name, route('category', $category));
});

Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
    $trail->push('Categories', route('categories'));
});

Breadcrumbs::for('wishlist', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
    $trail->push('Wishlist', route('wishlist'));
});

Breadcrumbs::for('cart', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
    $trail->push('Cart', route('cart'));
});