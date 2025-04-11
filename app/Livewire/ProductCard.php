<?php

namespace App\Livewire;

use Livewire\Component;
use function Illuminate\Log\log;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ProductCard extends Component
{
    public $product;
    public $isFavorited = false;
 
    public function mount($product)
    {
        $this->product = $product;
        $this->isFavorited = Auth::check() && Auth::user()->favoriteProducts()->where('product_id', $product->id)->first();
    }

    public function toggleFavorite()
    {
        if (!Auth::check()) return;
    
        $user = Auth::user();
    
        // Check if already favorited
        $isFavorited = $user->favoriteProducts()->where('product_id', $this->product->id)->exists();
    
        if ($isFavorited) {
            $user->favoriteProducts()->detach($this->product->id);
            $this->isFavorited = false;
        } else {
            $user->favoriteProducts()->attach($this->product->id);
            $this->isFavorited = true;
        }
    }
    public function render()
    {
        return view('livewire.product-card');
    }
}
