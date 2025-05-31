<?php

namespace App\Livewire;

use App\Models\Favorite;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FavoriteButton extends Component
{
    public $isFavorite = false;
    public $productId;
    public $size;

    public function mount($productId, $size = 7)
    {
        $this->productId = $productId;
        $this->isFavorite = Auth::check() && Auth::user()->favoriteProducts()->where('product_id', $productId)->first();
        $this->size = $size;
    }

    public function toggleFavorite()
    {
        $favoriteProducts = Favorite::getUserFavorites();

        $favoriteProduct = $favoriteProducts->where('product_id', $this->productId)->first();

        if ($favoriteProduct) {
            $favoriteProduct->delete();
            $this->isFavorite = false;
        } else {
            Favorite::create([
                'user_id' => Auth::user()?->id,
                'product_id' => $this->productId,
                'session_id' => Auth::user() ? null : session()->getId(),
            ]);
            $this->isFavorite = true;
        }
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }
}
