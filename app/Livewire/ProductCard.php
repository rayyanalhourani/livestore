<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductCard extends Component
{
    public $product;
    public $wishlist;
 
    public function mount(Product $product,bool $wishlist=false)
    {
        $product->loadAvg('reviews', 'rating')
            ->loadCount('reviews');
        $this->product = $product;
        $this->wishlist=$wishlist;
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
