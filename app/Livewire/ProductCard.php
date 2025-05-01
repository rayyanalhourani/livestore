<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

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

    public function deleteProductFromWishlist($productId){
        Auth::user()->favoriteProducts()->detach($productId);
        $this->dispatch('refreshWishlist');
        session()->flash('message', 'Products deleted from Wishlist!');
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
