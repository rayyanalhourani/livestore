<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FavoriteButton extends Component
{
    public $isFavorite = false;
    public $productId;
    public $size;

    public function mount($productId,$size=28)
    {
        $this->productId=$productId;
        $this->isFavorite = Auth::check() && Auth::user()->favoriteProducts()->where('product_id', $productId)->first();
        $this->size=$size;
    }

    public function toggleFavorite()
    {
        if (!Auth::check()) return;
    
        $user = Auth::user();
    
        $isFavorite = $user->favoriteProducts()->where('product_id', $this->productId)->exists();
    
        if ($isFavorite) {
            $user->favoriteProducts()->detach($this->productId);
            $this->isFavorite = false;
        } else {
            $user->favoriteProducts()->attach($this->productId);
            $this->isFavorite = true;
        }
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }
}
