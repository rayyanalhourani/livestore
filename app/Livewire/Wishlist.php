<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;

class Wishlist extends Component
{
    public $products;
    public $numberOfProducts;

    public function mount(){
        $this->products=Auth::user()->favoriteProducts;
        $this->numberOfProducts=$this->products->count();
    }
    public function render()
    {
        return view('livewire.wishlist');
    }
}
