<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProductCard extends Component
{
    public $product;
    public $isFavorited = false;
 
    public function mount($product)
    {
        $this->product = $product;
        $this->isFavorited = Auth::check() && Auth::user()->favorites->where('product_id', $product->id)->first();
    }

    public function toggleFavorite()
    {
        if (!Auth::check()) return;

        $user = Auth::user();
        $favorite = $user->favorites->where('product_id', $this->product->id)->first();

        if ($favorite) {
            $favorite->delete();
            $this->isFavorited = false;
        } else {
            $user->favorites->attach(['product_id' => $this->product->id]);
            $this->isFavorited = true;
        }
    }
    public function render()
    {
        return view('livewire.product-card');
    }
}
