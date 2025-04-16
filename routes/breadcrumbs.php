<?php

use App\Models\Product;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('product', function (BreadcrumbTrail $trail, Product $product) {
    $trail->push('Home', route('home'));
    $trail->push('Products', route('products'));
    $trail->push($product->name, route('product.show', $product));
});

