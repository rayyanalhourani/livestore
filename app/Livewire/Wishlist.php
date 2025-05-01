<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class Wishlist extends Component
{
    public $products;
    public $numberOfProducts;

    public function mount()
    {
        $this->products = Auth::user()->favoriteProducts;
        $this->numberOfProducts = $this->products->count();
    }

    public function MoveAllToCart()
    {
        $user = Auth::user();
        $cart = $user->cart()->firstOrCreate([]);

        foreach ($user->favoriteProducts as $product) {
            $cart->items()->updateOrCreate(
                ['product_id' => $product->id],
                ['quantity' => \DB::raw('quantity + 1')]
            );

            $user->favoriteProducts()->detach($product->id);
        }

        $this->refreshProducts();

        session()->flash('message', 'All products moved to cart!');
    }

    #[On('refreshWishlist')] 
    public function refreshProducts()
    {
        $this->products = Auth::user()->fresh()->favoriteProducts;
        $this->numberOfProducts = $this->products->count();
    }

    public function render()
    {
        return view('livewire.wishlist');
    }
}
