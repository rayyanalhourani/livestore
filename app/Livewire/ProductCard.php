<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProductCard extends Component
{
    public $product;
    public $isFavorite = false;
 
    public function mount($product)
    {
        $this->product = $product;
        $this->isFavorite = Auth::check() && Auth::user()->favoriteProducts()->where('product_id', $product->id)->first();
    }

    public function toggleFavorite()
    {
        if (!Auth::check()) return;
    
        $user = Auth::user();
    
        $isFavorite = $user->favoriteProducts()->where('product_id', $this->product->id)->exists();
    
        if ($isFavorite) {
            $user->favoriteProducts()->detach($this->product->id);
            $this->isFavorite = false;
        } else {
            $user->favoriteProducts()->attach($this->product->id);
            $this->isFavorite = true;
        }
    }
    public function render()
    {
        return view('livewire.product-card');
    }
}
