<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;

class Cart extends Component
{
    public $items;
    public function mount()
    {
        $this->items = Auth::user()->cart->items()->with('product')->get();
    }

    public function deleteProductFromCart($productId)
    {
        Auth::user()->cart->items()->where('product_id', $productId)->delete();
        $this->mount();
    }
    public function render()
    {
        return view('livewire.cart');
    }
}
