<?php

namespace App\Livewire;

use App\Models\Favorite;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProductCard extends Component
{
    public $product;
    public $wishlist;

    public function mount(Product $product, bool $wishlist = false)
    {
        $product->loadAvg('reviews', 'rating')
            ->loadCount('reviews')
            ->load("images");
        $this->product = $product;
        $this->wishlist = $wishlist;
    }

    public function addToCart($productId)
    {
        $user = Auth::user();
        $cart = $user->cart()->firstOrCreate([]);

        foreach ($user->favoriteProducts as $product) {
            $cart->items()->updateOrCreate(
                ['product_id' => $productId],
                ['quantity' => \DB::raw('quantity + 1')]
            );

            $user->favoriteProducts()->detach($product->id);
        }

        $this->dispatch('refreshWishlist');
    }

    public function deleteProductFromWishlist($productId)
    {
        Favorite::where('product_id', $productId)
            ->when(Auth::check(), function ($query) {
                $query->where('user_id', Auth::id());
            }, function ($query) {
                $query->where('session_id', session()->getId());
            })
            ->delete();

        $this->dispatch('refreshWishlist');
        session()->flash('message', 'Products deleted from Wishlist!');
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
