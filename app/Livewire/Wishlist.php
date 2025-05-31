<?php

namespace App\Livewire;

use App\Models\Favorite;
use Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class Wishlist extends Component
{
    public $products;
    public $numberOfProducts;

    public function mount()
    {
        $this->products = Favorite::getUserFavorites();
        $this->numberOfProducts = $this->products->count();
    }

    public function MoveAllToCart()
    {
        $cart = Cart::getUserCart();

        foreach ($this->products as $product) {
            $cart->items()->updateOrCreate(
                ['product_id' => $product->id],
                ['quantity' => \DB::raw('quantity + 1')]
            );
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
